@extends('layouts.app')

@section('title', 'Produk - Floralish')

@section('content')
<!-- Hero Section -->
<div class="relative bg-primary py-20">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&h=500&q=80" 
            alt="Background" class="w-full h-full object-cover opacity-20">
    </div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Koleksi Produk Kami</h1>
        <p class="text-xl text-white/90">Temukan rangkaian bunga terbaik untuk setiap momen spesial Anda</p>
    </div>
</div>

<!-- Filter Section -->
<div class="bg-white py-6 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Search -->
            <div class="relative">
                <input type="text" id="search" value="{{ request('search') }}" placeholder="Cari produk..." 
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            <!-- Kategori -->
            <div>
                <select id="category" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->category }}" {{ request('category') == $cat->category ? 'selected' : '' }}>
                            {{ $cat->category }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Sort -->
            <div>
                <select id="sort" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">Urutkan berdasarkan</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga (Terendah)</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga (Tertinggi)</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                </select>
            </div>
        </div>
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

@push('scripts')
<script>
    // Fungsi untuk mengupdate URL dengan parameter filter
    function updateFilters() {
        const search = document.getElementById('search').value;
        const category = document.getElementById('category').value;
        const sort = document.getElementById('sort').value;

        // Membuat URL dengan parameter yang ada
        let url = new URL(window.location.href);
        let params = new URLSearchParams(url.search);

        // Update parameter
        if (search) params.set('search', search);
        else params.delete('search');

        if (category) params.set('category', category);
        else params.delete('category');

        if (sort) params.set('sort', sort);
        else params.delete('sort');

        // Update URL dan reload halaman
        window.location.href = url.pathname + '?' + params.toString();
    }

    // Event listener untuk input pencarian dengan debounce
    let searchTimeout;
    document.getElementById('search').addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(updateFilters, 500);
    });

    // Event listener untuk select
    document.getElementById('category').addEventListener('change', updateFilters);
    document.getElementById('sort').addEventListener('change', updateFilters);
</script>
@endpush
@endsection 