<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Floralish')</title>
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
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .logo-text {
            font-family: 'Pacifico', cursive;
            font-size: 2.5rem;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            border-radius: 8px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-item {
            color: #4B5563;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: all 0.3s;
        }

        .dropdown-item:hover {
            background-color: #F3F4F6;
            color: #90C9CF;
        }

        .dropdown-divider {
            height: 1px;
            background-color: #E5E7EB;
            margin: 4px 0;
        }

        /* Mobile Menu */
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 40;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            width: 80%;
            max-width: 320px;
            height: 100%;
            background-color: white;
            z-index: 50;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #E5E7EB;
        }

        .mobile-menu-close {
            font-size: 1.5rem;
            color: #4B5563;
            background: none;
            border: none;
            cursor: pointer;
        }

        .mobile-menu-content {
            padding: 1rem;
        }

        .mobile-menu-item {
            display: block;
            padding: 0.75rem 0;
            color: #4B5563;
            text-decoration: none;
            border-bottom: 1px solid #E5E7EB;
        }

        .mobile-menu-dropdown {
            display: none;
            padding-left: 1rem;
        }

        .mobile-menu-dropdown-item {
            display: block;
            padding: 0.75rem 0;
            color: #4B5563;
            text-decoration: none;
        }

        .mobile-menu-divider {
            height: 1px;
            background-color: #E5E7EB;
            margin: 0.5rem 0;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navbar -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-black logo-text hover:text-primary transition-colors duration-300">Floralish.</a>
            
            <!-- Navigasi Desktop -->
            <nav class="hidden md:flex items-center">
                <ul class="flex space-x-6 mr-6">
                    <li><a href="/" class="text-black hover:text-primary">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-black hover:text-primary">Products</a></li>
                    <li><a href="#" class="text-black hover:text-primary">About</a></li>
                    <li><a href="#" class="text-black hover:text-primary">Contact</a></li>
                </ul>
                
                <!-- Menu Dropdown Profil -->
                <div class="dropdown">
                    <button class="flex items-center text-black hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @auth
                            {{ Auth::user()->name }}
                        @else
                            Profile
                        @endauth
                    </button>
                    <div class="dropdown-content">
                        @guest
                            <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                            <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                        @else
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">My Orders</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item w-full text-left">Logout</button>
                            </form>
                        @endguest
                    </div>
                </div>
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
            <a href="#" class="mobile-menu-item">About</a>
            <a href="#" class="mobile-menu-item">Contact</a>
            
            <div class="mt-4">
                <div class="mobile-menu-item">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Profile
                    @endauth
                </div>
                <div class="mobile-menu-dropdown">
                    @guest
                        <a href="{{ route('login') }}" class="mobile-menu-dropdown-item">Login</a>
                        <a href="{{ route('register') }}" class="mobile-menu-dropdown-item">Register</a>
                    @else
                        <a href="#" class="mobile-menu-dropdown-item">My Profile</a>
                        <a href="#" class="mobile-menu-dropdown-item">My Orders</a>
                        <div class="mobile-menu-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="mobile-menu-dropdown-item w-full text-left">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <main>
        @yield('content')
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

            <!-- Copyright -->
            <div class="mt-12 pt-8 border-t border-gray-200 text-center text-gray-600">
                <p>&copy; 2025 Floralish. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
    <script>
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        const mobileMenu = document.getElementById('mobileMenu');

        function openMobileMenu() {
            mobileMenuOverlay.style.display = 'block';
            mobileMenu.style.display = 'block';
            setTimeout(() => {
                mobileMenu.classList.add('active');
            }, 10);
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            setTimeout(() => {
                mobileMenu.style.display = 'none';
                mobileMenuOverlay.style.display = 'none';
            }, 300);
        }

        mobileMenuButton.addEventListener('click', openMobileMenu);
        mobileMenuClose.addEventListener('click', closeMobileMenu);
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);

        // Mobile Menu Dropdown
        const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');
        mobileMenuItems.forEach(item => {
            item.addEventListener('click', function() {
                const dropdown = this.nextElementSibling;
                if (dropdown && dropdown.classList.contains('mobile-menu-dropdown')) {
                    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                }
            });
        });
    </script>
</body>
</html> 