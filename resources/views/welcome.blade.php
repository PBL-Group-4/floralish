<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floralish - Selamat Datang</title>
    <!-- Tambahkan Font Poppins dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('style/welcome.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen">
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

    <!-- Bagian Hero -->
    <section class="bg-gradient-to-br from-primary to-secondary w-full px-4 pt-4 flex flex-col md:flex-row items-center">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-2">
                    <span class="text-black">Pesan</span> <span class="text-red-600">Bunga</span>
                </h1>
                <h2 class="text-2xl md:text-3xl font-semibold text-black mb-4">Mudah & Cepat</h2>
                <p class="text-xl text-black mb-8">Temukan keindahan dan keharuman bunga untuk setiap momen spesial Anda. Kami menyediakan berbagai rangkaian bunga segar dengan kualitas terbaik.</p>
                <button id="startButton" class="inline-block bg-button hover:bg-opacity-90 text-black font-semibold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                    Discover our Product
                </button>
                
                <div class="stats-container">
                    <div class="stat-item">
                        <div class="stat-value" id="orderCount">0</div>
                        <div class="stat-label">Total pesanan</div>
                    </div>
                    <div class="divider"></div>
                    <div class="stat-item">
                        <div class="stat-value" id="regionCount">0</div>
                        <div class="stat-label">Wilayah</div>
                    </div>
                    <div class="divider"></div>
                    <div class="stat-item">
                        <div class="stat-value" id="ratingValue">0</div>
                        <div class="stat-label">Rating</div>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="window-frame">
                    <div class="window-content">
                        <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=512&h=512&q=80" alt="Buket Bunga Indah">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Bagian Kategori -->
    <section class="bg-white container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center text-black mb-8">Kategori Produk</h2>
        <div class="flex flex-wrap justify-center gap-6 md:gap-10">
            <!-- Kategori 1 -->
            <div class="category-item">
                <div class="category-circle">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" alt="Bunga">
                </div>
                <h3 class="text-lg font-semibold text-center mt-3">Bunga</h3>
            </div>
            
            <!-- Kategori 2 -->
            <div class="category-item">
                <div class="category-circle">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" alt="Buket">
                </div>
                <h3 class="text-lg font-semibold text-center mt-3">Buket</h3>
            </div>
            
            <!-- Kategori 3 -->
            <div class="category-item">
                <div class="category-circle">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" alt="Hampers">
                </div>
                <h3 class="text-lg font-semibold text-center mt-3">Hampers</h3>
            </div>
            
            <!-- Kategori 4 -->
            <div class="category-item">
                <div class="category-circle">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" alt="Papan Bunga">
                </div>
                <h3 class="text-lg font-semibold text-center mt-3">Papan Bunga</h3>
            </div>
            
            <!-- Kategori 5 -->
            <div class="category-item">
                <div class="category-circle">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" alt="Box Bunga">
                </div>
                <h3 class="text-lg font-semibold text-center mt-3">Box Bunga</h3>
            </div>
            
            <!-- Kategori 6 -->
            <div class="category-item">
                <div class="category-circle">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=150&h=150&q=80" alt="Aksesoris">
                </div>
                <h3 class="text-lg font-semibold text-center mt-3">Aksesoris</h3>
            </div>
        </div>
    </section>
    
    <!-- Overlay Transisi -->
    <div id="transitionOverlay" class="transition-overlay">
        <div class="logo-container">
            <div class="flower-icon">🌸</div>
            <div class="logo-text">Floralish</div>
            <div class="logo-subtext">Menuju ke halaman utama...</div>  
        </div>
    </div>
    
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>
