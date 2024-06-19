<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $user_id = Auth::id();
        $session_id = session()->getId();

        if ($user_id) {
            $cart = Cart::updateOrCreate(
                ['user_id' => $user_id, 'product_id' => $product_id],
                ['quantity' => $quantity]
            );
        } else {
            $cart = Cart::updateOrCreate(
                ['session_id' => $session_id, 'product_id' => $product_id],
                ['quantity' => $quantity]
            );
        }

        return response()->json(['status' => 'success', 'cart' => $cart]);
    }

    public function syncCart()
    {
        $user_id = Auth::id();
        $session_id = session()->getId();

        if ($user_id) {
            $guestCartItems = Cart::where('session_id', $session_id)->get();

            foreach ($guestCartItems as $item) {
                Cart::updateOrCreate(
                    ['user_id' => $user_id, 'product_id' => $item->product_id],
                    ['quantity' => $item->quantity]
                );
                $item->delete();
            }
        }
    }

}
