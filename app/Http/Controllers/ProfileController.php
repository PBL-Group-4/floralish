<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function orders()
    {
        $orders = auth()->user()->orders()
            ->with('product')
            ->latest()
            ->paginate(10);
            
        return view('profile.orders', compact('orders'));
    }

    public function printReceipt(Order $order)
    {
        // Ensure the user can only view their own orders
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        $order->load(['product']);
        return view('profile.order-receipt', compact('order'));
    }
} 