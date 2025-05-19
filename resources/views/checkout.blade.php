@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Checkout</h1>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Summary -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-3">Detail Produk</h2>
                <div class="flex items-start space-x-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" 
                            class="w-full h-full object-cover rounded-lg shadow-md">
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-800 text-lg">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($product->description, 100) }}</p>
                        <div class="mt-2">
                            <span class="text-primary font-bold text-xl">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Checkout Form -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-3">Informasi Pengiriman</h2>
                <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-md focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-base transition-colors duration-200">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <input type="tel" name="phone" id="phone" required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-md focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-base transition-colors duration-200">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea name="address" id="address" rows="4" required
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-md focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-base transition-colors duration-200"></textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="payment_proof" class="block text-sm font-medium text-gray-700 mb-2">Bukti Pembayaran</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-indigo-500 transition-colors duration-200 shadow-md">
                            <div class="space-y-1 text-center">
                                <!-- Preview Image -->
                                <div id="image-preview" class="hidden mb-4">
                                    <img id="preview" src="#" alt="Preview" class="mx-auto max-h-48 rounded-lg shadow-lg">
                                    <button type="button" id="remove-image" class="mt-2 text-sm text-red-600 hover:text-red-800">
                                        Hapus gambar
                                    </button>
                                </div>
                                <!-- Upload Icon -->
                                <svg id="upload-icon" class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="payment_proof" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload file</span>
                                        <input id="payment_proof" name="payment_proof" type="file" class="sr-only" accept="image/*" required>
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">Format yang didukung: JPG, JPEG, PNG. Maksimal 2MB</p>
                            </div>
                        </div>
                        @error('payment_proof')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-md">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Informasi Pembayaran</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                Bank: BCA
                            </p>
                            <p class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                No. Rekening: 1234567890
                            </p>
                            <p class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Atas Nama: Floralish
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex justify-center py-3 px-6 border border-transparent shadow-lg text-base font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                            Konfirmasi Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Preview image before upload
    document.getElementById('payment_proof').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                const imagePreview = document.getElementById('image-preview');
                const uploadIcon = document.getElementById('upload-icon');
                
                preview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                uploadIcon.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    // Remove image
    document.getElementById('remove-image').addEventListener('click', function() {
        const input = document.getElementById('payment_proof');
        const preview = document.getElementById('preview');
        const imagePreview = document.getElementById('image-preview');
        const uploadIcon = document.getElementById('upload-icon');
        
        input.value = '';
        preview.src = '#';
        imagePreview.classList.add('hidden');
        uploadIcon.classList.remove('hidden');
    });
</script>
@endpush
@endsection 