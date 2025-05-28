@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto text-center">
        <div class="mb-8">
            <svg class="mx-auto h-16 w-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-4">Pesanan Berhasil Dibuat!</h1>
        
        <p class="text-lg text-gray-600 mb-8">
            Terima kasih telah berbelanja di Floralish. Pesanan Anda sedang diproses.
        </p>

        <div class="bg-gray-50 p-6 rounded-lg mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Langkah Selanjutnya</h2>
            <ul class="text-left space-y-3">
                <li class="flex items-start">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Tim kami akan memverifikasi pembayaran Anda</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Anda akan menerima konfirmasi melalui WhatsApp</span>
                </li>
                <li class="flex items-start">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Pesanan akan diproses dan dikirim sesuai jadwal</span>
                </li>
            </ul>
        </div>

        <div class="space-x-4">
            <a href="{{ route('profile.orders') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Pesanan saya
            </a>
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Lihat Produk Lainnya
            </a>
        </div>
    </div>
</div>
@endsection 