<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floralish - Navbar</title>
    <!-- Tambahkan Font Poppins dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.0/dist/flowbite.js"></script>
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
    </style>
</head>
<body style="background: linear-gradient(to bottom left, #E0F7F9, #5EA9B7, #FCE8D5); min-height: 100vh;">
<!-- Bagian Header -->
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-black">Floralish</div>
        
        <!-- Navigasi Desktop -->
        <nav class="hidden md:flex items-center">
            <ul class="flex space-x-6 mr-6">
                <li><a href="#" class="text-black hover:text-primary">Home</a></li>
                <li><a href="#" class="text-black hover:text-primary">Products</a></li>
                <li><a href="#" class="text-black hover:text-primary">About</a></li>
                <li><a href="#" class="text-black hover:text-primary">Contact</a></li>
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
                    <a href="#" class="dropdown-item">Login</a>
                    <a href="#" class="dropdown-item">Register</a>
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
        <a href="#" class="mobile-menu-item">Home</a>
        <a href="#" class="mobile-menu-item">Products</a>
        <a href="#" class="mobile-menu-item">About</a>
        <a href="#" class="mobile-menu-item">Contact</a>
        
        <div class="mt-4">
            <div class="mobile-menu-item">Profile</div>
            <div class="mobile-menu-dropdown">
                <a href="#" class="mobile-menu-dropdown-item">Login</a>
                <a href="#" class="mobile-menu-dropdown-item">Register</a>
            </div>
        </div>
    </div>
</div>

<!-- Main -->

<h2 class="text-4xl ml-28 mt-20 font-semibold text-black">Bouquet Hand </h2>


<div class="flex space-x-14 overflow-hidden">
    <img class="w-[500px] h-[400px] object-cover ml-28 mt-14 rounded-3xl shadow-xl flex-shrink-0 overflow-hidden" src="{{ asset('image/buketbunga.png') }}" alt="image description">
    <div class="overflow-hidden max-w-lg flex flex-col space-y-4 mt-20 ">
    <h4 class="text-xl font-semibold tracking-tight">Nama Bunga</h4>
    <h5 class="text-2xl font-semibold">$599</h5>
    <p class="text-black ">Buket Serenity Bloom menghadirkan perpaduan elegan antara mawar putih yang melambangkan ketulusan hati, hydrangea biru muda sebagai simbol ketenangan dan pengertian, serta sentuhan lembut dari baby’s breath yang memberi nuansa manis dan damai. Dibalut dengan kertas wrapping biru klasik dan pita senada, buket ini cocok untuk momen istimewa seperti ulang tahun, wisuda, atau sekadar mengungkapkan kasih yang tulus dan tenang.</p>
    </div>

</div>
    


</body>
</html> 