<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderDetail extends Controller
{
    public function index()
    {
        $user_id = auth()->id();

        $orders = Order::where('user_id', $user_id)
            ->with('transaction')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('store.order.orderdetail', compact('orders'));
    }
}
