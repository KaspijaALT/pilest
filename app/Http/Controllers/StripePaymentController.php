<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class StripePaymentController extends Controller
{
    public function handleCheckout() {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $this->calculateTotal(), // Calculate the total cost in cents
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];

        return view('checkout', $output);
    }

    private function calculateTotal() {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total * 100; // Convert to cents
    }
}
