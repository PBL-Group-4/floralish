@extends('admin.layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Tambah Produk Baru</h1>
        <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Produk -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                        class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary @error('name') border-red-500 @enderror"
                        placeholder="Masukkan nama produk">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                    <div class="relative">
                        <span class="absolute left-4 top-2 text-gray-500">Rp</span>
                        <input type="number" name="price" id="price" value="{{ old('price') }}"
                            class="w-full border rounded-lg py-2 pl-12 pr-4 focus:outline-none focus:ring-2 focus:ring-primary @error('price') border-red-500 @enderror"
                            placeholder="0">
                    </div>
                    @error('price')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                        class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary @error('stock') border-red-500 @enderror"
                        placeholder="0">
                    @error('stock')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="category" id="category" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        <option value="">Pilih Kategori</option>
                        <option value="Bunga" {{ old('category') == 'Bunga' ? 'selected' : '' }}>Bunga</option>
                        <option value="Karangan Bunga Papan" {{ old('category') == 'Karangan Bunga Papan' ? 'selected' : '' }}>Karangan Bunga Papan</option>
                        <option value="Kado & Cakes" {{ old('category') == 'Kado & Cakes' ? 'selected' : '' }}>Kado & Cakes</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lokasi -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                    @if(request('location'))
                        <input type="text" name="location" id="location" value="{{ request('location') }}" readonly
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-gray-50">
                    @else
                        <select name="location" id="location" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                            <option value="">Pilih Lokasi</option>
                            <option value="batam" {{ old('location') == 'batam' ? 'selected' : '' }}>Batam</option>
                            <option value="jakarta" {{ old('location') == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                            <option value="bandung" {{ old('location') == 'bandung' ? 'selected' : '' }}>Bandung</option>
                            <option value="surabaya" {{ old('location') == 'surabaya' ? 'selected' : '' }}>Surabaya</option>
                            <option value="medan" {{ old('location') == 'medan' ? 'selected' : '' }}>Medan</option>
                            <option value="padang" {{ old('location') == 'padang' ? 'selected' : '' }}>Padang</option>
                            <option value="palembang" {{ old('location') == 'palembang' ? 'selected' : '' }}>Palembang</option>
                            <option value="pekanbaru" {{ old('location') == 'pekanbaru' ? 'selected' : '' }}>Pekanbaru</option>
                            <option value="pontianak" {{ old('location') == 'pontianak' ? 'selected' : '' }}>Pontianak</option>
                            <option value="kupang" {{ old('location') == 'kupang' ? 'selected' : '' }}>Kupang</option>
                            <option value="ambon" {{ old('location') == 'ambon' ? 'selected' : '' }}>Ambon</option>
                            <option value="manado" {{ old('location') == 'manado' ? 'selected' : '' }}>Manado</option>
                            <option value="makassar" {{ old('location') == 'makassar' ? 'selected' : '' }}>Makassar</option>
                            <option value="banjarmasin" {{ old('location') == 'banjarmasin' ? 'selected' : '' }}>Banjarmasin</option>
                            <option value="samarinda" {{ old('location') == 'samarinda' ? 'selected' : '' }}>Samarinda</option>
                        </select>
                    @endif
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                        <div class="space-y-1 text-center">
                            <div id="image-preview" class="hidden mb-4">
                                <img id="preview" src="#" alt="Preview" class="mx-auto h-32 w-32 object-cover rounded-lg">
                            </div>
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary/80 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                    <span>Upload file</span>
                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF sampai 2MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary @error('description') border-red-500 @enderror"
                        placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Preview image before upload
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection 