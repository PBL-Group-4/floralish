<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function settings()
    {
        $user = auth()->user();
        return view('profile.settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        
        if (isset($validated['phone'])) {
            $user->phone = $validated['phone'];
        }
        
        if (isset($validated['address'])) {
            $user->address = $validated['address'];
        }
        
        $user->save();

        return redirect()->route('profile.settings')->with('success', 'Profile information updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();
        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return redirect()->route('profile.settings')->with('success', 'Password updated successfully');
    }

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