<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class CartController extends Controller
{
    public function addToCart(Request $request, $id) {
        $property = Property::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "Property_type" => $property->Property_type,
                "quantity" => 1,
                "price" => $property->Price,
                "photo" => $property->picture
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Property added to cart successfully!');
    }

    public function showCart() {
        return view('cart', ['cartItems' => session()->get('cart', [])]);
    }

    public function removeItem($id) {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Property removed from cart successfully!');
    }
}