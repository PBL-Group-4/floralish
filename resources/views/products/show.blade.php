@extends('layouts.app')

@section('title', $product->name . ' - Floralish')

@section('content')
<!-- Product Detail -->
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Product Image -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="relative pb-[100%]">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" 
                    class="absolute inset-0 w-full h-full object-cover">
            </div>
        </div>

        <!-- Product Info -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
            <div class="flex items-center mb-4">
                <span class="text-primary font-bold text-2xl">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                <span class="ml-4 px-3 py-1 bg-secondary text-primary rounded-full text-sm">{{ $product->category }}</span>
            </div>
            
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h2>
                <p class="text-gray-600">{{ $product->description }}</p>
            </div>

            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Stok</h2>
                <p class="text-gray-600">{{ $product->stock }} unit tersedia</p>
            </div>

            <a href="{{ route('checkout', $product->id) }}" class="block w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-semibold transition-colors duration-300 text-center">
                Pesan Sekarang
            </a>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="mt-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Terkait</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $related)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <a href="{{ route('products.show', $related) }}" class="block">
                        <div class="relative pb-[75%]">
                            <img src="{{ asset($related->image) }}" alt="{{ $related->name }}" 
                                class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $related->name }}</h3>
                            <div class="flex justify-between items-center">
                                <span class="text-primary font-bold">Rp {{ number_format($related->price, 0, ',', '.') }}</span>
                                <span class="text-sm text-gray-500">{{ $related->category }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection 