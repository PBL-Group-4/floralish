@extends('admin.layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Pesanan #{{ $order->id }}</h1>
            <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 hover:text-indigo-900">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Order Status -->
            <div class="p-6 border-b">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800">Status Pesanan</h2>
                    <form action="{{ route('admin.orders.update-status', $order) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()" 
                            class="text-sm border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </form>
                </div>
            </div>

            <!-- Order Details -->
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pesanan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Detail Produk</h3>
                        <div class="flex items-start space-x-4">
                            <img src="{{ asset($order->product->image) }}" alt="{{ $order->product->name }}" 
                                class="w-24 h-24 object-cover rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">{{ $order->product->name }}</p>
                                <p class="text-sm text-gray-500">{{ $order->product->description }}</p>
                                <p class="text-primary font-bold mt-1">Rp {{ number_format($order->product->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 mb-2">Informasi Pengiriman</h3>
                        <div class="space-y-2">
                            <p class="text-sm text-gray-900">
                                <span class="font-medium">Nama:</span> {{ $order->name }}
                            </p>
                            <p class="text-sm text-gray-900">
                                <span class="font-medium">Telepon:</span> {{ $order->phone }}
                            </p>
                            <p class="text-sm text-gray-900">
                                <span class="font-medium">Alamat:</span> {{ $order->address }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Proof -->
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Bukti Pembayaran</h2>
                <div class="max-w-md">
                    <img src="{{ asset('storage/' . $order->payment_proof) }}" 
                        alt="Payment Proof" 
                        class="w-full rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 