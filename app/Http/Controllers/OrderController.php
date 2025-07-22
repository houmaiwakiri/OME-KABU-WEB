<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController
{
    public function index()
    {
        $orders = Order::orderBy('ordered_at', 'desc')->get();
        return view('orders', compact('orders'));
    }
}