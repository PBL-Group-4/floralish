<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floralish - Selamat Datang</title>
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
    <link rel="stylesheet" href="{{ asset('style/welcome.css') }}">
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
            position: relative;
            top: 0.5rem;
        }
        .navbar-container {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Bagian Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 navbar-container flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-black logo-text hover:text-primary transition-colors duration-300 navbar-logo">Floralish.</a>
            
            <!-- Navigasi Desktop -->
            <nav class="hidden md:flex items-center">
                <ul class="flex space-x-6 mr-6">
                    <li><a href="#" class="text-black hover:text-primary">Home</a></li>
                    <li><a href="#" class="text-black hover:text-primary">Products</a></li>
                    <li><a href="#" class="text-black hover:text-primary">About</a></li>
                    <li><a href="#" class="text-black hover:text-primary">Contact</a></li>
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
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">My Orders</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item w-full text-left">Logout</button>
                        </form>
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
                    <a href="{{ route('login') }}" class="mobile-menu-dropdown-item">Login</a>
                    <a href="{{ route('register') }}" class="mobile-menu-dropdown-item">Register</a>
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
    
    <!-- Bagian Catalog Produk -->
    <section class="bg-white w-full px-0 py-12">
        <h2 class="text-3xl font-bold text-center text-black mb-8">Catalog Produk</h2>
        
        <!-- Container untuk baris pertama -->
        <div class="relative mb-16">
            <div class="flex overflow-x-hidden scroll-smooth w-full" id="firstRow">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden aspect-square min-w-[25vw] mx-2 mb-4">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Mawar" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Mawar</h3>
                        <p class="text-primary font-bold mt-2">Rp 150.000</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden aspect-square min-w-[25vw] mx-2 mb-4">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Tulip" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Tulip</h3>
                        <p class="text-primary font-bold mt-2">Rp 200.000</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden aspect-square min-w-[25vw] mx-2 mb-4">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Lily" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Lily</h3>
                        <p class="text-primary font-bold mt-2">Rp 175.000</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden aspect-square min-w-[25vw] mx-2 mb-4">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Anggrek" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Anggrek</h3>
                        <p class="text-primary font-bold mt-2">Rp 250.000</p>
                    </div>
                </div>
            </div>
            
            <!-- Tombol navigasi baris pertama -->
            <button class="absolute right-0 top-1/2 -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-primary hover:text-white transition-colors duration-300 z-10" onclick="scrollRight('firstRow')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <button class="absolute left-0 top-1/2 -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-primary hover:text-white transition-colors duration-300 z-10" onclick="scrollLeft('firstRow')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>

        <!-- Container untuk baris kedua -->
        <div class="relative">
            <div class="flex overflow-x-hidden scroll-smooth w-full" id="secondRow">
                <!-- Card 5 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden aspect-square min-w-[25vw] mx-2 mb-4">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Matahari" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Matahari</h3>
                        <p class="text-primary font-bold mt-2">Rp 180.000</p>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden aspect-square min-w-[25vw] mx-2 mb-4">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Melati" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Melati</h3>
                        <p class="text-primary font-bold mt-2">Rp 120.000</p>
                    </div>
                </div>

                <!-- Card 7 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden aspect-square min-w-[25vw] mx-2 mb-4">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Lavender" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Lavender</h3>
                        <p class="text-primary font-bold mt-2">Rp 160.000</p>
                    </div>
                </div>

                <!-- Card 8 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden aspect-square min-w-[25vw] mx-2 mb-4">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Sakura" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Sakura</h3>
                        <p class="text-primary font-bold mt-2">Rp 220.000</p>
                    </div>
                </div>
            </div>
            
            <!-- Tombol navigasi baris kedua -->
            <button class="absolute right-0 top-1/2 -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-primary hover:text-white transition-colors duration-300 z-10" onclick="scrollRight('secondRow')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <button class="absolute left-0 top-1/2 -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-primary hover:text-white transition-colors duration-300 z-10" onclick="scrollLeft('secondRow')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
    </section>

    <!-- Features -->
    <section class="max-w-full mx-0 mt-6 px-4 sm:px-6 md:px-10 lg:px-16">
        <div class="bg-white rounded-2xl px-6 py-8 max-w-screen-xl mx-auto shadow-md flex flex-col sm:flex-row justify-between items-center gap-6">
            <!-- Item -->
            <div class="flex items-center gap-4 min-w-[200px] flex-1 justify-center sm:justify-start">
                <div class="text-[#7eaeb5] text-3xl"><i class="fas fa-shipping-fast"></i></div>
                <div>
                    <div class="font-bold text-base sm:text-lg">Gratis Ongkir</div>
                    <div class="text-gray-600 text-sm">Free Ongkir Pembelian Didalam Kota</div>
                </div>
            </div>

            <div class="flex items-center gap-4 min-w-[200px] flex-1 justify-center sm:justify-start">
                <div class="text-[#7eaeb5] text-3xl"><i class="far fa-map"></i></div>
                <div>
                    <div class="font-bold text-base sm:text-lg">Jangkauan Luas</div>
                    <div class="text-gray-600 text-sm">Kirim ke 200+ Kota di Indonesia</div>
                </div>
            </div>

            <div class="flex items-center gap-4 min-w-[200px] flex-1 justify-center sm:justify-start">
                <div class="text-[#7eaeb5] text-3xl"><i class="fas fa-shield-alt"></i></div>
                <div>
                    <div class="font-bold text-base sm:text-lg">Keamanan Pembeli</div>
                    <div class="text-gray-600 text-sm">Menjamin keamanan Data pembeli</div>
                </div>
            </div>

            <div class="flex items-center gap-4 min-w-[200px] flex-1 justify-center sm:justify-start relative">
                <div class="text-[#7eaeb5] text-3xl relative">
                    <i class="fas fa-clock"></i>
                    <div class="absolute top-[-0.5rem] left-1/2 transform -translate-x-1/2 bg-white rounded-full text-xs text-[#7eaeb5] font-bold w-5 h-5 flex items-center justify-center shadow-sm">24</div>
                </div>
                <div>
                    <div class="font-bold text-base sm:text-lg">Garansi Waktu</div>
                    <div class="text-gray-600 text-sm">Pesanan anda pasti tiba sesuai Jadwal</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Offline Store / Lokasi -->
    <section class="max-w-6xl mx-auto mt-10 px-4 sm:px-6 md:px-10 lg:px-16 pb-10">
        <h3 class="text-[#7eaeb5] text-center text-lg sm:text-xl font-semibold tracking-widest mb-8">Temukan Offline Store kami</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
            @foreach(['Batam','Jakarta','Bandung','Surabaya','Medan','Padang','Palembang','Pekanbaru','Pontianak','Kupang','Ambon','Manado','Makassar','Banjarmasin','Samarinda'] as $city)
                <button class="btn-store bg-[#7eaeb5] rounded-full shadow-lg py-3 px-8 text-white hover:brightness-90 transition text-sm font-medium">{{ $city }}</button>
            @endforeach
        </div>
    </section>

    <!-- Overlay Transisi -->
    <div id="transitionOverlay" class="transition-overlay">
        <div class="logo-container">
            <div class="flower-icon">🌸</div>
            <div class="logo-text" style="font-size: 3rem;">Floralish.</div>
            <div class="logo-subtext">Menuju ke halaman utama...</div>  
        </div>
    </div>
    
    <script src="{{ asset('js/welcome.js') }}"></script>
    <script>
        function scrollRight(elementId) {
            const element = document.getElementById(elementId);
            const cardWidth = element.offsetWidth / 4; // 25% of container width
            const currentScroll = element.scrollLeft;
            const maxScroll = element.scrollWidth - element.clientWidth;
            
            if (currentScroll < maxScroll) {
                element.scrollTo({
                    left: Math.min(currentScroll + cardWidth, maxScroll),
                    behavior: 'smooth'
                });
            }
        }

        function scrollLeft(elementId) {
            const element = document.getElementById(elementId);
            const cardWidth = element.offsetWidth / 4; // 25% of container width
            const currentScroll = element.scrollLeft;
            
            if (currentScroll > 0) {
                element.scrollTo({
                    left: Math.max(currentScroll - cardWidth, 0),
                    behavior: 'smooth'
                });
            }
        }

        // Inisialisasi scroll behavior saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const rows = ['firstRow', 'secondRow'];
            
            rows.forEach(rowId => {
                const row = document.getElementById(rowId);
                if (row) {
                    // Fungsi untuk mengecek dan update status tombol
                    function updateButtonStates() {
                        const canScrollLeft = row.scrollLeft > 0;
                        const canScrollRight = row.scrollLeft < (row.scrollWidth - row.clientWidth);
                        
                        // Update tombol scroll kiri
                        const leftButton = row.parentElement.querySelector('button[onclick*="scrollLeft"]');
                        if (leftButton) {
                            leftButton.style.opacity = canScrollLeft ? '1' : '0.5';
                            leftButton.style.pointerEvents = canScrollLeft ? 'auto' : 'none';
                        }
                        
                        // Update tombol scroll kanan
                        const rightButton = row.parentElement.querySelector('button[onclick*="scrollRight"]');
                        if (rightButton) {
                            rightButton.style.opacity = canScrollRight ? '1' : '0.5';
                            rightButton.style.pointerEvents = canScrollRight ? 'auto' : 'none';
                        }
                    }

                    // Tambahkan event listener untuk scroll
                    row.addEventListener('scroll', updateButtonStates);
                    
                    // Panggil fungsi update saat halaman dimuat
                    updateButtonStates();
                }
            });
        });
    </script>

    @include('footer')
</body>
</html>
