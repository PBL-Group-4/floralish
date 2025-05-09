@extends('layouts.admin')

@section('title', 'Produk Batam - Admin Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Produk Batam</h1>
        <a href="{{ route('admin.batam.products.create') }}" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-300">
            Tambah Produk
        </a>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <form action="{{ route('admin.batam.products.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." 
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            <div>
                <select name="category" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">Semua Kategori</option>
                    <option value="Bunga" {{ request('category') == 'Bunga' ? 'selected' : '' }}>Bunga</option>
                    <option value="Karangan Bunga Papan" {{ request('category') == 'Karangan Bunga Papan' ? 'selected' : '' }}>Karangan Bunga Papan</option>
                    <option value="Kado & Cakes" {{ request('category') == 'Kado & Cakes' ? 'selected' : '' }}>Kado & Cakes</option>
                </select>
            </div>
            
            <div>
                <select name="stock_filter" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">Semua Stok</option>
                    <option value="in_stock" {{ request('stock_filter') == 'in_stock' ? 'selected' : '' }}>Stok Baik (>10)</option>
                    <option value="low_stock" {{ request('stock_filter') == 'low_stock' ? 'selected' : '' }}>Stok Menipis (1-10)</option>
                    <option value="out_of_stock" {{ request('stock_filter') == 'out_of_stock' ? 'selected' : '' }}>Habis (0)</option>
                </select>
            </div>
            
            <div>
                <select name="sort" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="">Urutkan berdasarkan</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga (Terendah)</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga (Tertinggi)</option>
                    <option value="stock_asc" {{ request('sort') == 'stock_asc' ? 'selected' : '' }}>Stok (Terendah)</option>
                    <option value="stock_desc" {{ request('sort') == 'stock_desc' ? 'selected' : '' }}>Stok (Tertinggi)</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @forelse($products as $product)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">
                            <div class="w-16 h-16">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded">
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{ $product->name }}</p>
                                    <p class="text-xs text-gray-600">{{ Str::limit($product->description, 50) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $product->category }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if($product->stock > 10)
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                    {{ $product->stock }}
                                </span>
                            @elseif($product->stock > 0)
                                <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                    {{ $product->stock }}
                                </span>
                            @else
                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">
                                    Habis
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.batam.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800">
                                    Edit
                                </a>
                                <form action="{{ route('admin.batam.products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-500">
                            Tidak ada produk yang ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $products->appends(request()->query())->links() }}
    </div>
</div>
@endsection 