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
        <div class="relative mb-12">
            <div class="flex overflow-x-hidden scroll-smooth w-full" id="firstRow">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden aspect-square min-w-[25vw] mx-2">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Mawar" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Mawar</h3>
                        <p class="text-primary font-bold mt-2">Rp 150.000</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden aspect-square min-w-[25vw] mx-2">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Tulip" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Tulip</h3>
                        <p class="text-primary font-bold mt-2">Rp 200.000</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden aspect-square min-w-[25vw] mx-2">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Lily" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Lily</h3>
                        <p class="text-primary font-bold mt-2">Rp 175.000</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden aspect-square min-w-[25vw] mx-2">
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
                <div class="bg-white rounded-lg shadow-md overflow-hidden aspect-square min-w-[25vw] mx-2">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Matahari" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Matahari</h3>
                        <p class="text-primary font-bold mt-2">Rp 180.000</p>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden aspect-square min-w-[25vw] mx-2">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Melati" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Melati</h3>
                        <p class="text-primary font-bold mt-2">Rp 120.000</p>
                    </div>
                </div>

                <!-- Card 7 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden aspect-square min-w-[25vw] mx-2">
                    <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=500&q=80" 
                         alt="Bunga Lavender" 
                         class="w-full h-3/4 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-black">Bunga Lavender</h3>
                        <p class="text-primary font-bold mt-2">Rp 160.000</p>
                    </div>
                </div>

                <!-- Card 8 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden aspect-square min-w-[25vw] mx-2">
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

    <!-- Footer -->
    <footer class="bg-gray-100">
        <!-- Bagian Atas Footer -->
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-lg font-semibold mb-4 md:mb-0">
                    Ada yang ingin ditanyakan lebih lanjut?
                </div>
                <a href="https://wa.me/6281290040903" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-full flex items-center transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    Hubungi Kami di WhatsApp
                </a>
            </div>
        </div>

        <!-- Bagian Bawah Footer -->
        <div class="bg-gray-800 text-white">
            <div class="container mx-auto px-4 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Tentang Kami -->
                    <div>
                        <h3 class="text-2xl font-bold mb-6">Tentang Kami</h3>
                        <p class="text-gray-300 leading-relaxed">
                            Geo Indo Sinergi adalah perusahaan yang mengkhususkan diri dalam layanan rekayasa. Didirikan pada tahun 2015, perjalanan kami dimulai dengan visi untuk memberikan solusi inovatif dan berkualitas tinggi di industri rekayasa. Pada tahun 2018, kami secara resmi menjadi entitas hukum dengan status perusahaan terbatas, setelah menerima surat keputusan resmi dari Kementerian Hukum dan Hak Asasi Manusia (AHU-0060208.AH.01.01 Tahun 2018).
                        </p>
                    </div>

                    <!-- Kontak Kami -->
                    <div>
                        <h3 class="text-2xl font-bold mb-6">Kontak Kami</h3>
                        <div class="space-y-6 text-gray-300">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-white mb-1">CALL:</p>
                                    <p>+62 812 9004 0903</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-white mb-1">MAIL:</p>
                                    <p>geoindosinergi@gmail.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-white mb-1">ADDRESS:</p>
                                    <p>Ruko Boulevard, Jl. Taman Tekno Blok D No.1,</p>
                                    <p>BSD City, Tangerang Selatan 15314</p>
                                    <p class="mt-2">(021) 2931 3480 | Fax (021) 2931 3483</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigasi dan Bahasa -->
                    <div>
                        <h3 class="text-2xl font-bold mb-6">Navigasi</h3>
                        <div class="grid grid-cols-2 gap-4 text-gray-300">
                            <div class="space-y-4">
                                <a href="#" class="flex items-center hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    About
                                </a>
                                <a href="#" class="flex items-center hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    Client
                                </a>
                                <a href="#" class="flex items-center hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Contact
                                </a>
                            </div>
                            <div class="space-y-4">
                                <a href="#" class="flex items-center hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Layanan Kami
                                </a>
                                <a href="#" class="flex items-center hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Galeri
                                </a>
                            </div>
                        </div>

                        <!-- Google Translate -->
                        <div class="mt-8">
                            <div class="flex items-center mb-2">
                                <img src="https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" alt="Google" class="h-6 mr-2">
                                <span class="text-lg">Translate</span>
                            </div>
                            <select class="mt-2 bg-gray-700 text-white rounded px-3 py-1 w-48">
                                <option>Pilih Bahasa</option>
                                <option value="id">Indonesia</option>
                                <option value="en">English</option>
                            </select>
                            <p class="text-sm text-gray-400 mt-2">Diberdayakan oleh Google Translate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
