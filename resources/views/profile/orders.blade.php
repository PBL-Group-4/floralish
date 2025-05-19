@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Pesanan Saya</h1>

        @if($orders->isEmpty())
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-600">Anda belum memiliki pesanan.</p>
                <a href="{{ route('products.index') }}" class="inline-block mt-4 text-indigo-600 hover:text-indigo-900">
                    Lihat Produk
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-800">Pesanan #{{ $order->id }}</h2>
                                    <p class="text-sm text-gray-500">{{ $order->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full
                                    @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status == 'confirmed') bg-blue-100 text-blue-800
                                    @elseif($order->status == 'completed') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>

                            <div class="flex items-start space-x-4">
                                <img src="{{ asset($order->product->image) }}" 
                                    alt="{{ $order->product->name }}" 
                                    class="w-24 h-24 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h3 class="font-medium text-gray-900">{{ $order->product->name }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ Str::limit($order->product->description, 100) }}</p>
                                    <p class="text-primary font-bold mt-2">Rp {{ number_format($order->product->price, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="mt-4 pt-4 border-t">
                                <h4 class="text-sm font-medium text-gray-500 mb-2">Informasi Pengiriman</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-900">
                                            <span class="font-medium">Nama:</span> {{ $order->name }}
                                        </p>
                                        <p class="text-sm text-gray-900">
                                            <span class="font-medium">Telepon:</span> {{ $order->phone }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-900">
                                            <span class="font-medium">Alamat:</span> {{ $order->address }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            @if($order->payment_proof)
                                <div class="mt-4 pt-4 border-t">
                                    <h4 class="text-sm font-medium text-gray-500 mb-2">Bukti Pembayaran</h4>
                                    <img src="{{ asset('storage/' . $order->payment_proof) }}" 
                                        alt="Payment Proof" 
                                        class="max-w-xs rounded-lg shadow-md">
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>
@endsection 