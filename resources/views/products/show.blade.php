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
            
            <!-- Rating Display -->
            <div class="flex items-center mb-4">
                <div class="flex items-center">
                    <div class="flex">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= round($product->averageRating()) ? 'text-yellow-400' : 'text-gray-300' }}" 
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="ml-2 text-gray-600">({{ $product->totalRatings() }} ulasan)</span>
                </div>
            </div>

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

            @auth
                <a href="{{ route('checkout', $product->id) }}" class="block w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-semibold transition-colors duration-300 text-center mb-4">
                    Pesan Sekarang
                </a>

                <!-- Rating Form -->
                <div class="border-t pt-4 mt-4">
                    <h3 class="text-lg font-semibold mb-3">Berikan Rating</h3>
                    <form action="{{ route('products.rate', $product) }}" method="POST" class="space-y-4" id="ratingForm">
                        @csrf
                        <div class="flex items-center space-x-2" id="starRating">
                            @php
                                $userRating = $product->ratings->where('user_id', auth()->id())->first()?->rating ?? 0;
                            @endphp
                            @for ($i = 1; $i <= 5; $i++)
                                <label class="cursor-pointer">
                                    <input type="radio" name="rating" value="{{ $i }}" class="hidden" id="star-{{ $i }}"
                                        {{ $userRating == $i ? 'checked' : '' }}>
                                    <svg data-star="{{ $i }}" class="w-8 h-8 star-svg {{ $i <= $userRating ? 'text-yellow-400' : 'text-gray-300' }} transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </label>
                            @endfor
                            <span class="ml-2 text-gray-600">
                                @if($userRating)
                                    {{ $userRating }} bintang
                                @else
                                    Pilih rating
                                @endif
                            </span>
                        </div>
                        <div>
                            <textarea name="comment" rows="3" 
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                placeholder="Tulis ulasan Anda (opsional)">{{ $product->ratings->where('user_id', auth()->id())->first()?->comment }}</textarea>
                        </div>
                        <div class="flex justify-between">
                            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                                {{ $product->ratings->where('user_id', auth()->id())->first() ? 'Update Rating' : 'Kirim Rating' }}
                            </button>
                            @if($product->ratings->where('user_id', auth()->id())->first())
                                <form action="{{ route('products.rate.destroy', $product) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus Rating</button>
                                </form>
                            @endif
                        </div>
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const stars = document.querySelectorAll('#starRating .star-svg');
                            const radios = document.querySelectorAll('#starRating input[type=radio]');
                            function setStars(rating) {
                                stars.forEach((star, idx) => {
                                    if (idx < rating) {
                                        star.classList.add('text-yellow-400');
                                        star.classList.remove('text-gray-300');
                                    } else {
                                        star.classList.remove('text-yellow-400');
                                        star.classList.add('text-gray-300');
                                    }
                                });
                            }
                            radios.forEach((radio, idx) => {
                                radio.addEventListener('change', function () {
                                    setStars(idx + 1);
                                });
                            });
                            // Hover effect
                            stars.forEach((star, idx) => {
                                star.addEventListener('mouseenter', function () {
                                    setStars(idx + 1);
                                });
                                star.addEventListener('mouseleave', function () {
                                    const checked = Array.from(radios).findIndex(r => r.checked);
                                    setStars(checked >= 0 ? checked + 1 : 0);
                                });
                                star.addEventListener('click', function () {
                                    radios[idx].checked = true;
                                    setStars(idx + 1);
                                });
                            });
                        });
                    </script>
                </div>
            @else
                <a href="{{ route('login') }}" class="block w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-semibold transition-colors duration-300 text-center">
                    Login untuk Checkout
                </a>
                <p class="text-sm text-gray-500 text-center mt-2">Silakan login untuk melakukan pemesanan</p>
            @endauth
        </div>
    </div>

    <!-- Reviews Section -->
    @if($product->ratings->count() > 0)
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Ulasan Pembeli</h2>
        <div class="space-y-6">
            @foreach($product->ratings()->with('user')->latest()->get() as $rating)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $rating->rating ? 'text-yellow-400' : 'text-gray-300' }}" 
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-gray-600">{{ $rating->user->name }}</span>
                        </div>
                        <span class="text-sm text-gray-500">{{ $rating->created_at->diffForHumans() }}</span>
                    </div>
                    @if($rating->comment)
                        <p class="text-gray-600">{{ $rating->comment }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    @endif

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