<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-3 sm:px-4 md:px-6 py-2 sm:py-3 md:py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-xl sm:text-2xl md:text-3xl font-bold text-black logo-text hover:text-primary transition-colors duration-300">
                Floralish.
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-4 lg:space-x-6">
                <a href="{{ route('home') }}" class="text-sm lg:text-base text-black hover:text-primary transition-colors duration-300">Home</a>
                <a href="{{ route('products.index') }}" class="text-sm lg:text-base text-black hover:text-primary transition-colors duration-300">Products</a>
                <a href="{{ route('about') }}" class="text-sm lg:text-base text-black hover:text-primary transition-colors duration-300">About</a>
                <a href="{{ route('contact') }}" class="text-sm lg:text-base text-black hover:text-primary transition-colors duration-300">Contact</a>
                <a href="{{ route('lokasi.index') }}" class="text-sm lg:text-base text-black hover:text-primary transition-colors duration-300">Lokasi</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuButton" class="md:hidden text-black p-2 hover:bg-gray-100 rounded-lg transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden fixed inset-0 bg-white z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="flex justify-between items-center p-4 border-b">
            <div class="text-lg font-bold text-black">Menu</div>
            <button id="mobileMenuClose" class="text-2xl text-gray-600 p-2 hover:bg-gray-100 rounded-lg transition-colors duration-300">&times;</button>
        </div>
        <nav class="p-4">
            <a href="{{ route('home') }}" class="block py-3 text-base text-black border-b border-gray-100 hover:bg-gray-50 transition-colors duration-300">Home</a>
            <a href="{{ route('products.index') }}" class="block py-3 text-base text-black border-b border-gray-100 hover:bg-gray-50 transition-colors duration-300">Products</a>
            <a href="{{ route('about') }}" class="block py-3 text-base text-black border-b border-gray-100 hover:bg-gray-50 transition-colors duration-300">About</a>
            <a href="{{ route('contact') }}" class="block py-3 text-base text-black border-b border-gray-100 hover:bg-gray-50 transition-colors duration-300">Contact</a>
            <a href="{{ route('lokasi.index') }}" class="block py-3 text-base text-black border-b border-gray-100 hover:bg-gray-50 transition-colors duration-300">Lokasi</a>
        </nav>
    </div>
</header>

<script>
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenuClose = document.getElementById('mobileMenuClose');
    const mobileMenu = document.getElementById('mobileMenu');

    function toggleMobileMenu() {
        mobileMenu.classList.toggle('translate-x-full');
        document.body.style.overflow = mobileMenu.classList.contains('translate-x-full') ? '' : 'hidden';
    }

    mobileMenuButton.addEventListener('click', toggleMobileMenu);
    mobileMenuClose.addEventListener('click', toggleMobileMenu);

    // Close mobile menu on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && !mobileMenu.classList.contains('translate-x-full')) {
            toggleMobileMenu();
        }
    });
</script>