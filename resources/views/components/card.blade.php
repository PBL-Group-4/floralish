<div class="card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:scale-105">
    <div class="relative aspect-w-1 aspect-h-1">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 sm:h-56 md:h-64 lg:h-72 xl:h-80 object-cover">
        <div class="absolute top-2 right-2 z-10">
            <button class="bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
    </div>
    <div class="p-3 sm:p-4 md:p-5 flex flex-col h-full">
        <h3 class="text-base sm:text-lg md:text-xl font-semibold text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-xs sm:text-sm md:text-base text-gray-600 mb-3 sm:mb-4">{{ $description }}</p>
        <div class="flex justify-between items-center mt-auto">
            <span class="text-sm sm:text-base md:text-lg font-bold text-primary">Rp {{ number_format($price, 0, ',', '.') }}</span>
            <button class="bg-primary text-white text-xs sm:text-sm md:text-base px-3 sm:px-4 py-1.5 sm:py-2 rounded-md hover:bg-primary-dark transition-colors duration-300">
                Add to Cart
            </button>
        </div>
    </div>
</div>
