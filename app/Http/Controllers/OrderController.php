<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout($productId)
    {
        $product = Product::findOrFail($productId);
        return view('checkout', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'product_id' => 'required|exists:products,id'
        ]);

        $paymentProofPath = $request->file('payment_proof')->store('payment-proofs', 'public');
        $product = Product::findOrFail($request->product_id);

        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'payment_proof' => $paymentProofPath,
            'status' => 'pending'
        ]);

        // Create notification for new order
        Notification::create([
            'type' => 'order',
            'message' => "Pesanan baru #{$order->id} dari {$order->name} - {$product->name}",
            'data' => [
                'order_id' => $order->id,
                'customer_name' => $order->name,
                'product_name' => $product->name,
                'product_price' => $product->price
            ]
        ]);

        return redirect()->route('orders.success')->with('success', 'Pesanan Anda telah berhasil dibuat!');
    }

    public function success()
    {
        return view('orders.success');
    }
} 