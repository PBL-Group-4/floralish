<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Floralish')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Tambahkan Font Poppins dan Pacifico dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">
    <!-- Tambahkan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#90C9CF',
                        secondary: '#CDE6E8',
                        button: '#E6F0F2',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        pacifico: ['Pacifico', 'cursive'],
                    },
                    animation: {
                        'marquee': 'marquee 20s linear infinite',
                    },
                    keyframes: {
                        marquee: {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(-50%)' },
                        },
                    },
                }
            }
        }
    </script>
    <style>
    /* Font utama */
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Logo dan Navbar */
    .logo-text {
        font-family: 'Pacifico', cursive;
        font-size: 2.5rem;
    }
    .navbar-logo {
        margin-top: 0;
        display: flex;
        align-items: center;
    }
    .navbar-container {
        padding-top: 1.3rem;
        padding-bottom: 1.3rem;
    }
    .logo-font { 
        font-family: 'Roboto Slab', cursive; 
        font-weight: 700; 
    }

    /* Tombol */
    .btn-store, .btn-pilih {
        font-family: 'Roboto Mono', monospace;
        font-size: 0.875rem;
    }
    .btn-store {
       font-family: 'Roboto Mono', monospace;
       font-weight: 500;
       font-size: 0.875rem;
       letter-spacing: 0.15em;
    }
    .btn-pilih {
        font-family: 'Roboto Mono', monospace;
        font-weight: 600;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
    }

    .btn {
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }
    .btn:hover {
        transform: translateY(-2px);
    }

    @media (min-width: 1792px) {
        .btn {
            padding: 0.75rem 1.5rem;
        }
    }

    /* Navbar Dropdown */
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown::after {
        content: '';
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        height: 20px;
        background: transparent;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
        z-index: 1000;
        border-radius: 4px;
        margin-top: 0.5rem;
        padding-top: 0.5rem;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .dropdown-item {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-item:hover {
        background-color: #f1f1f1;
    }
    .dropdown-divider {
        height: 1px;
        background-color: #e5e5e5;
        margin: 4px 0;
    }
    .dropdown-button {
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    /* Mobile menu */
    .mobile-menu-overlay {
        display: none;
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 40;
    }
    .mobile-menu {
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        width: 80%;
        max-width: 300px;
        background-color: white;
        z-index: 50;
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
    }
    .mobile-menu.active {
        transform: translateX(0);
    }
    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #e5e5e5;
    }
    .mobile-menu-close {
        font-size: 1.5rem;
        color: #666;
    }
    .mobile-menu-content {
        padding: 1rem;
    }
    .mobile-menu-item {
        display: block;
        padding: 0.75rem 0;
        color: black;
        text-decoration: none;
    }
    .mobile-menu-dropdown {
        padding-left: 1rem;
    }
    .mobile-menu-dropdown-item {
        display: block;
        padding: 0.5rem 0;
        color: #666;
        text-decoration: none;
    }

    @media (min-width: 360px) {
        .mobile-menu {
            width: 90%;
        }
    }
    @media (min-width: 390px) {
        .mobile-menu {
            width: 85%;
        }
    }
    @media (min-width: 428px) {
        .mobile-menu {
            width: 80%;
        }
    }
    @media (min-width: 1792px) {
        .mobile-menu {
            max-width: 100%;
        }
    }

    /* Marquee animasi */
    .animate-marquee {
        animation: marquee 20s linear infinite;
        will-change: transform;
    }
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    /* Container responsive */
    .container {
        width: 100%;
        max-width: 100%;
        padding-left: clamp(1rem, 5vw, 2rem);
        padding-right: clamp(1rem, 5vw, 2rem);
        margin: 0 auto;
    }
    @media (min-width: 360px) {
        .container {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }
    @media (min-width: 390px) {
        .container {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }
    @media (min-width: 428px) {
        .container {
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }
    }
    @media (min-width: 768px) {
        .container {
            padding-left: 3rem;
            padding-right: 3rem;
        }
    }
    @media (min-width: 1024px) {
        .container {
            padding-left: 4rem;
            padding-right: 4rem;
        }
    }
    @media (min-width: 1792px) {
        .container {
            padding-left: 5rem;
            padding-right: 5rem;
            max-width: 1792px;
        }
    }

    /* Typography */
    .text-responsive {
        font-size: clamp(1rem, 2vw, 1.25rem);
    }
    .heading-responsive {
        font-size: clamp(1.5rem, 4vw, 2.5rem);
    }
    @media (min-width: 1792px) {
        .text-responsive {
            font-size: 1.25rem;
        }
        .heading-responsive {
            font-size: 2.5rem;
        }
    }

    /* Grid */
    .grid-responsive {
        display: grid;
        gap: 1rem;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
    @media (min-width: 1792px) {
        .grid-responsive {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    /* Kartu produk */
    .card {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    @media (min-width: 1792px) {
        .card {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    }

    /* Input Form */
    .form-input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.25rem;
        transition: border-color 0.3s ease;
    }
    .form-input:focus {
        border-color: #90C9CF;
        outline: none;
    }
    @media (min-width: 1792px) {
        .form-input {
            padding: 0.75rem;
        }
    }

    /* Grid utility */
    @media (min-width: 1792px) {
        .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .text-2xl { font-size: 1.75rem; }
        .text-3xl { font-size: 2rem; }
        .text-4xl { font-size: 2.5rem; }
        .space-x-6 > * + * { margin-left: 2rem; }
        .space-y-8 > * + * { margin-top: 3rem; }
    }

    /* Container tambahan */
    .footer-container,
    .content-container {
        max-width: 1792px;
        margin: 0 auto;
    }
</style>

</head>
<body class="min-h-screen">
    <!-- Navbar -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 navbar-container flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-black logo-text hover:text-primary transition-colors duration-300 navbar-logo">Floralish.</a>
            
            <!-- Navigasi Desktop -->
            <nav class="hidden md:flex items-center">
                <ul class="flex space-x-6 mr-6">
                    <li><a href="/" class="text-black hover:text-primary">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-black hover:text-primary">Products</a></li>
                    <li><a href="/about" class="text-black hover:text-primary">About</a></li>
                    <li><a href="/contact" class="text-black hover:text-primary">Contact</a></li>
                    <li><a href="/lokasi" class="text-black hover:text-primary">Lokasi</a></li>
                </ul>
                
                <!-- Menu Dropdown Profil (Belum Login) -->
                <div class="dropdown {{ Auth::check() ? 'hidden' : '' }}">
                    <button class="flex items-center text-black hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                        <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                    </div>
                </div>
                
                <!-- Menu Dropdown Profil (Sudah Login) -->
                <div class="dropdown {{ Auth::check() ? '' : 'hidden' }}" id="loggedInDropdown">
                    <button class="flex items-center text-black hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ Auth::check() ? Auth::user()->name : 'Profile' }}
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('profile.settings') }}" class="dropdown-item">My Profile</a>
                        <a href="{{ route('profile.orders') }}" class="dropdown-item">My Orders</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item w-full text-left">Logout</button>
                        </form>
                    </div>
                </div>

                <!-- WhatsApp Button -->
                <a href="{{ route('whatsapp.send') }}" class="flex items-center text-black hover:text-primary ml-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </a>
            </nav>
            
            <!-- Tombol Menu Mobile -->
            <button id="mobileMenuButton" class="md:hidden text-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Menu Mobile -->
    <div id="mobileMenuOverlay" class="mobile-menu-overlay"></div>
    <div id="mobileMenu" class="mobile-menu">
        <div class="mobile-menu-header">
            <div class="text-xl font-bold text-black">Menu</div>
            <button id="mobileMenuClose" class="mobile-menu-close">&times;</button>
        </div>
        <div class="mobile-menu-content">
            <a href="/" class="mobile-menu-item">Home</a>
            <a href="{{ route('products.index') }}" class="mobile-menu-item">Products</a>
            <a href="/about" class="mobile-menu-item">About</a>
            <a href="/contact" class="mobile-menu-item">Contact</a>
            <a href="/lokasi" class="mobile-menu-item">Lokasi</a>
            
            <div class="mt-4">
                <div class="mobile-menu-item">Profile</div>
                <div class="mobile-menu-dropdown">
                    <a href="{{ route('login') }}" class="mobile-menu-dropdown-item">Login</a>
                    <a href="{{ route('register') }}" class="mobile-menu-dropdown-item">Register</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <main class="flex-grow w-full">
        <div class="content-container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-20">
        <!-- Wave Divider -->
        <div class="relative">
            <div class="absolute top-0 left-0 w-full overflow-hidden leading-none">
                <svg class="relative block w-full h-12" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-[#d1f0f5]"></path>
                </svg>
            </div>
        </div>

        <!-- Our Partners Section -->
        <div class="w-full bg-gray-50 py-12" data-aos="fade-down" data-aos-delay="100">
            <h3 class="text-center text-xl font-semibold text-gray-800 mb-8">Our Partners</h3>
            
            <!-- Marquee Container -->
            <div class="relative overflow-hidden w-full">
                <div class="flex animate-marquee space-x-16">
                    <!-- First Set of Logos -->
                    @foreach(['BCA.png', 'BNI.png', 'BRi.png', 'BUMN.png', 'JNE.png', 'JNT.png', 'Lion_parcel.png', 'SiCepat.png'] as $logo)
                        <div class="flex-shrink-0 w-32 h-32 bg-white rounded-xl flex items-center justify-center shadow-sm hover:shadow-md transition-shadow p-4">
                            <img src="{{ asset('image/support/' . $logo) }}" alt="Partner Logo" class="w-full h-full object-contain">
                        </div>
                    @endforeach
                    
                    <!-- Duplicate Set for Seamless Loop -->
                    @foreach(['BCA.png', 'BNI.png', 'BRi.png', 'BUMN.png', 'JNE.png', 'JNT.png', 'Lion_parcel.png', 'SiCepat.png'] as $logo)
                        <div class="flex-shrink-0 w-32 h-32 bg-white rounded-xl flex items-center justify-center shadow-sm hover:shadow-md transition-shadow p-4">
                            <img src="{{ asset('image/support/' . $logo) }}" alt="Partner Logo" class="w-full h-full object-contain">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <h2 class="text-3xl font-pacifico text-[#7eaeb5] mb-4">Floralish.</h2>
                    <p class="text-gray-600 mb-4 max-w-md">
                        Menyediakan rangkaian bunga berkualitas tinggi untuk setiap momen spesial Anda. Kami berkomitmen memberikan pengalaman berbelanja bunga yang menyenangkan dan memuaskan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-[#7eaeb5] hover:text-[#6a9ba3] transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-[#7eaeb5] hover:text-[#6a9ba3] transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-[#7eaeb5] hover:text-[#6a9ba3] transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-[#7eaeb5] hover:text-[#6a9ba3] transition">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-600 hover:text-[#7eaeb5] transition">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-600 hover:text-[#7eaeb5] transition">Products</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#7eaeb5] transition">About Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#7eaeb5] transition">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-map-marker-alt w-5 text-[#7eaeb5]"></i>
                            <span>Jl. Bunga Indah No. 123, Jakarta</span>
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-phone w-5 text-[#7eaeb5]"></i>
                            <span>+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center text-gray-600">
                            <i class="fas fa-envelope w-5 text-[#7eaeb5]"></i>
                            <span>info@floralish.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <div class="max-w-md mx-auto text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Subscribe to Our Newsletter</h3>
                    <div class="flex gap-2">
                        <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:border-[#7eaeb5]">
                        <button class="bg-[#7eaeb5] text-white px-6 py-2 rounded-full hover:bg-[#6a9ba3] transition">
                            Subscribe
                        </button>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-12 pt-8 border-t border-gray-200 text-center text-gray-600">
                <p>&copy; 2025 Floralish. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Function to check if device is mobile
        function isMobile() {
            return window.innerWidth < 768; // md breakpoint in Tailwind
        }

        // Initialize AOS with conditional settings
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false,
            disable: isMobile(), // Disable on mobile
            startEvent: 'DOMContentLoaded'
        });

        // Update AOS on window resize
        window.addEventListener('resize', function() {
            if (isMobile()) {
                AOS.disable();
            } else {
                AOS.enable();
                AOS.refresh();
            }
        });

    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const mobileMenuClose = document.getElementById('mobileMenuClose');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.style.display = 'block';
        mobileMenuOverlay.style.display = 'block';
        setTimeout(() => {
            mobileMenu.classList.add('active');
        }, 10);
    });

    mobileMenuClose.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        setTimeout(() => {
            mobileMenu.style.display = 'none';
            mobileMenuOverlay.style.display = 'none';
        }, 300);
    });

    mobileMenuOverlay.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        setTimeout(() => {
            mobileMenu.style.display = 'none';
            mobileMenuOverlay.style.display = 'none';
        }, 300);
    });
    </script>
</body>
</html> 