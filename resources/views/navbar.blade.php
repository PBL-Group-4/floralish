<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floralish - Navbar</title>
    <!-- Tambahkan Font Poppins dan Pacifico dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">
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
    <link rel="stylesheet" href="{{ asset('style/navbar.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .logo-text {
            font-family: 'Pacifico', cursive;
            font-size: 2.5rem;
        }
        .navbar-logo {
            margin-top: 0.5rem;
        }
        /* Navbar Styles */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
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
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
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
    </style>
</head>
<body class="min-h-screen">
<!-- Bagian Header -->
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-black logo-text hover:text-primary transition-colors duration-300 navbar-logo">Floralish.</a>
        
        <!-- Navigasi Desktop -->
        <nav class="hidden md:flex items-center">
            <ul class="flex space-x-6 mr-6">
                <li><a href="/" class="text-black hover:text-primary">Home</a></li>
                <li><a href="/produk" class="text-black hover:text-primary">Products</a></li>
                <li><a href="/about" class="text-black hover:text-primary">About</a></li>
                <li><a href="/contact" class="text-black hover:text-primary">Contact</a></li>
            </ul>
            
            <!-- Menu Dropdown Profil (Belum Login) -->
            <div class="dropdown">
                <button class="flex items-center text-black hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Profile
                </button>
                <div class="dropdown-content">
                    <a href="/login" class="dropdown-item">Login</a>
                    <a href="/register" class="dropdown-item">Register</a>
                </div>
            </div>
            
            <!-- Menu Dropdown Profil (Sudah Login) - Tersembunyi secara default -->
            <div class="dropdown hidden" id="loggedInDropdown">
                <button class="flex items-center text-black hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    John Doe
                </button>
                <div class="dropdown-content">
                    <a href="#" class="dropdown-item">My Profile</a>
                    <a href="#" class="dropdown-item">My Orders</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">Logout</a>
                </div>
            </div>
            
            <!-- WhatsApp Button -->
            <a href="{{ route('whatsapp.send') }}" class="flex items-center text-black hover:text-primary ml-4">
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
        <a href="/produk" class="mobile-menu-item">Products</a>
        <a href="/about" class="mobile-menu-item">About</a>
        <a href="/contact" class="mobile-menu-item">Contact</a>
        
        <div class="mt-4">
            <div class="mobile-menu-item">Profile</div>
            <div class="mobile-menu-dropdown">
                <a href="/login" class="mobile-menu-dropdown-item">Login</a>
                <a href="/register" class="mobile-menu-dropdown-item">Register</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const mobileMenuClose = document.getElementById('mobileMenuClose');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.add('active');
        mobileMenuOverlay.classList.add('active');
    });

    mobileMenuClose.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
    });

    mobileMenuOverlay.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        mobileMenu.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
    });
</script>
</body>
</html> 