<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public  function viewCart()
    {
        return view('store.cart');
    }
}
