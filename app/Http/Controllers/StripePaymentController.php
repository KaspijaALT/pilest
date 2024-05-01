<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session as StripeSession; 

class StripePaymentController extends Controller
{
    public function handleCheckout()
{
    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    $cart = session('cart');
    if (!$cart || count($cart) === 0) {
        return redirect()->route('cart')->with('error', 'Your cart is empty!');
    }

    $line_items = [];
    foreach ($cart as $id => $details) {
        $line_items[] = [
            'price_data' => [
                'currency' => 'USD',
                'product_data' => [
                    'name' => $details['Property_type'],  // Ensure this is a string and not null
                ],
                'unit_amount' => $details['price'] * 100,  // Convert to cents
            ],
            'quantity' => $details['quantity'],
        ];
    }

    try {
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cart'),
        ]);

        return redirect()->away($session->url);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Log the error or handle it according to your needs
        return redirect()->route('cart')->with('error', 'Failed to create Stripe session: ' . $e->getMessage());
    }
}

}