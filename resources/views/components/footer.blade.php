<footer class="bg-white w-full">
    <!-- Wave Divider -->
    <div class="relative w-full">
        <div class="absolute top-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-8 sm:h-12 md:h-16" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-[#d1f0f5]"></path>
            </svg>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
            <!-- Company Info -->
            <div class="col-span-1 sm:col-span-2">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-pacifico text-[#7eaeb5] mb-4">Floralish.</h2>
                <p class="text-sm sm:text-base md:text-lg text-gray-600 mb-4 max-w-md">
                    Menyediakan rangkaian bunga berkualitas tinggi untuk setiap momen spesial Anda. Kami berkomitmen memberikan pengalaman berbelanja bunga yang menyenangkan dan memuaskan.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-[#7eaeb5] hover:text-[#6a9ba3] transition-colors duration-300">
                        <i class="fab fa-instagram text-lg sm:text-xl md:text-2xl"></i>
                    </a>
                    <a href="#" class="text-[#7eaeb5] hover:text-[#6a9ba3] transition-colors duration-300">
                        <i class="fab fa-facebook text-lg sm:text-xl md:text-2xl"></i>
                    </a>
                    <a href="#" class="text-[#7eaeb5] hover:text-[#6a9ba3] transition-colors duration-300">
                        <i class="fab fa-twitter text-lg sm:text-xl md:text-2xl"></i>
                    </a>
                    <a href="#" class="text-[#7eaeb5] hover:text-[#6a9ba3] transition-colors duration-300">
                        <i class="fab fa-tiktok text-lg sm:text-xl md:text-2xl"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-base sm:text-lg md:text-xl font-semibold text-gray-800 mb-4">Quick Links</h3>
                <ul class="space-y-2 sm:space-y-3">
                    <li><a href="{{ route('home') }}" class="text-sm sm:text-base md:text-lg text-gray-600 hover:text-[#7eaeb5] transition-colors duration-300">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-sm sm:text-base md:text-lg text-gray-600 hover:text-[#7eaeb5] transition-colors duration-300">Products</a></li>
                    <li><a href="{{ route('about') }}" class="text-sm sm:text-base md:text-lg text-gray-600 hover:text-[#7eaeb5] transition-colors duration-300">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm sm:text-base md:text-lg text-gray-600 hover:text-[#7eaeb5] transition-colors duration-300">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-base sm:text-lg md:text-xl font-semibold text-gray-800 mb-4">Contact Us</h3>
                <ul class="space-y-2 sm:space-y-3">
                    <li class="flex items-center text-sm sm:text-base md:text-lg text-gray-600">
                        <i class="fas fa-map-marker-alt w-5 sm:w-6 text-[#7eaeb5]"></i>
                        <span class="ml-2">Jl. Bunga Indah No. 123, Jakarta</span>
                    </li>
                    <li class="flex items-center text-sm sm:text-base md:text-lg text-gray-600">
                        <i class="fas fa-phone w-5 sm:w-6 text-[#7eaeb5]"></i>
                        <span class="ml-2">+62 812 3456 7890</span>
                    </li>
                    <li class="flex items-center text-sm sm:text-base md:text-lg text-gray-600">
                        <i class="fas fa-envelope w-5 sm:w-6 text-[#7eaeb5]"></i>
                        <span class="ml-2">info@floralish.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-8 sm:mt-12 md:mt-16 pt-6 sm:pt-8 md:pt-10 border-t border-gray-200 text-center">
            <p class="text-sm sm:text-base md:text-lg text-gray-600">&copy; 2025 Floralish. All rights reserved.</p>
        </div>
    </div>
</footer>