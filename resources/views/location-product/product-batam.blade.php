@extends('layouts.app')

@section('title', 'Offline Store Batam - Floralish')

@section('content')
<!-- Hero Section -->
<div class="relative bg-primary py-20">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&h=500&q=80" 
            alt="Background" class="w-full h-full object-cover opacity-20">
    </div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Offline Store Batam</h1>
        <p class="text-xl text-white/90">Temukan rangkaian bunga terbaik di toko kami di Batam</p>
    </div>
</div>

<!-- Filter Section -->
<div class="bg-white py-6 shadow-sm">
    <div class="container mx-auto px-4">
        <form action="{{ route('lokasi.show', ['location' => 'batam']) }}" method="GET" class="flex flex-wrap gap-4 justify-between items-center">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Cari produk..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div class="w-[200px]">
                <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category }}" {{ request('category') == $category->category ? 'selected' : '' }}>
                            {{ $category->category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="w-[200px]">
                <select name="sort" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Urutkan</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama: A-Z</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama: Z-A</option>
                </select>
            </div>
            <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90 transition-colors">
                Filter
            </button>
        </form>
    </div>
</div>

<!-- Products Grid -->
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <a href="{{ route('products.show', $product) }}" class="block">
                    <div class="relative pb-[75%]">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" 
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ Str::limit($product->description, 50) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-primary font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="text-sm text-gray-500">{{ $product->category }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Tidak ada produk yang ditemukan</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->appends(request()->query())->links() }}
    </div>
</div>

<!-- Location Map -->
<div class="container mx-auto px-4 py-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Lokasi Toko</h2>
    <div class="aspect-w-16 aspect-h-9">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126932.123456789!2d104.0!3d1.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMcKwMDAnMDAuMCJOIDEwNMKwMDAnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
            class="w-full h-full rounded-lg"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
</div>
@endsection 