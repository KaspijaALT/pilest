<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Property;
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
                        'name' => $details['Property_type'],
                    ],
                    'unit_amount' => $details['price'] * 100,
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

    public function success(Request $request)
    {
        $cart = session('cart');
        if (!$cart || count($cart) === 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }

        $client_id = Auth::id(); // Assuming the user is authenticated

        foreach ($cart as $id => $details) {
            Order::create([
                'property_id' => $id,
                'client_id' => $client_id,
                'OrderDate' => now(),
                'status' => 'Completed',
                'Funding' => 'Stripe',
            ]);
        }

        // Clear the cart after successful order
        session()->forget('cart');

        return redirect()->route('thankyou'); // Redirect to the thank you page
    }
}
