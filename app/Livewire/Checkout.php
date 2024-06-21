<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $cartItemsJson;
    public $total;

    public function mount()
    {
        $cartItems = \Cart::content()->toArray();  // Convert to array
        $this->cartItemsJson = json_encode($cartItems);  // Encode to JSON
        $this->total = \Cart::total();
    }

    public function processCheckout()
    {
        if (Auth::check()) {
            $order = $this->createOrder();

            if ($order) {
                \Cart::destroy();
                return redirect()->route('order.success', ['order' => $order->id]);
            } else {
                session()->flash('error', 'There was an issue processing your order. Please try again.');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function createOrder()
    {
        $cartItems = json_decode($this->cartItemsJson, true);
        dd($cartItems);

        // Your order creation logic goes here
        // Example:
        // $order = Order::create([
        //     'user_id' => Auth::id(),
        //     'total' => $this->total,
        //     'status' => 'pending',
        // ]);

        // foreach ($cartItems as $item) {
        //     $order->items()->create([
        //         'product_id' => $item['id'],
        //         'quantity' => $item['qty'],
        //         'price' => $item['price'],
        //         'options' => $item['options'],
        //     ]);
        // }

        // return $order;
    }

    public function render()
    {
        $cartItems = json_decode($this->cartItemsJson, true);
        return view('livewire.checkout', ['cartItems' => $cartItems]);
    }
}
