<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Florish.id - Lokasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <!-- Tambahkan Font Poppins dan Pacifico dari Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto+Mono&family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
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
    .logo-font { 
      font-family: 'Roboto Slab', cursive; 
      font-weight: 700; 
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
    /* Tambahan CSS untuk animasi marquee yang lebih halus */
    .animate-marquee {
      animation: marquee 20s linear infinite;
      will-change: transform;
    }
    @keyframes marquee {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }
  </style>
</head>
<body class="bg-gradient-to-b from-[#d1f0f5] to-[#a1d9db] min-h-screen">

<!-- Bagian Header -->
<header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-black logo-text hover:text-primary transition-colors duration-300 navbar-logo">Floralish.</a>
        
        <!-- Navigasi Desktop -->
        <nav class="hidden md:flex items-center">
            <ul class="flex space-x-6 mr-6">
                <li><a href="{{ route('home') }}" class="text-black hover:text-primary">Home</a></li>
                <li><a href="{{ route('products') }}" class="text-black hover:text-primary">Products</a></li>
                <li><a href="{{ route('about') }}" class="text-black hover:text-primary">About</a></li>
                <li><a href="{{ route('contact') }}" class="text-black hover:text-primary">Contact</a></li>
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
        <a href="{{ route('home') }}" class="mobile-menu-item">Home</a>
        <a href="{{ route('products') }}" class="mobile-menu-item">Products</a>
        <a href="{{ route('about') }}" class="mobile-menu-item">About</a>
        <a href="{{ route('contact') }}" class="mobile-menu-item">Contact</a>
        
        <div class="mt-4">
            <div class="mobile-menu-item">Profile</div>
            <div class="mobile-menu-dropdown">
                <a href="#" class="mobile-menu-dropdown-item">Login</a>
                <a href="#" class="mobile-menu-dropdown-item">Register</a>
            </div>
        </div>
    </div>
</div>

  <!-- Hero Section -->
  <section class="max-w-6xl mx-auto mt-6 px-4 sm:px-6 md:px-10 lg:px-16 relative">
    <div class="rounded-3xl overflow-hidden relative flex justify-center">
    
    <img alt="Person holding white roses"
     class="rounded-3xl w-full max-w-4xl object-cover"
     src="{{ asset('image/lokasi_asset/Frame 2.png') }}" />

      <div class="absolute top-1/2 right-6 transform -translate-y-1/2 bg-white rounded-2xl p-6 max-w-md shadow-lg">
        <h2 class="font-bold text-lg sm:text-xl leading-tight mb-2 text-center">Toko Bunga & Florist Online Terlengkap, Kirim Se-Indonesia</h2>
        <p class="text-xs sm:text-sm font-semibold text-center mb-4">Toko bunga & florist online yang menghadirkan rangkaian bunga berkualitas tinggi...</p>
        <button class="btn-pilih bg-[#7eaeb5] text-white rounded-full px-5 py-2 mx-auto block shadow-md hover:bg-[#6a9ba3] transition-colors">Pilih Tujuan Pengiriman</button>
      </div>
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
    <h3 class="text-white text-center text-lg sm:text-xl font-semibold tracking-widest mb-8">Temukan Offline Store kami</h3>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
      @foreach(['Batam','Jakarta','Bandung','Surabaya','Medan','Padang','Palembang','Pekanbaru','Pontianak','Kupang','Ambon','Manado','Makassar','Banjarmasin','Samarinda'] as $city)
        <button class="btn-store bg-white rounded-full shadow-lg py-3 px-8 text-[#7eaeb5] hover:brightness-90 transition text-sm font-medium">{{ $city }}</button>
      @endforeach
    </div>
  </section>

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
    <div class="w-full bg-gray-50 py-12">
      <h3 class="text-center text-xl font-semibold text-gray-800 mb-8">Our Partners</h3>
      
      <!-- Marquee Container -->
      <div class="relative overflow-hidden w-full">
        <div class="flex animate-marquee space-x-16 whitespace-nowrap">
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
                    <li><a href="#" class="text-gray-600 hover:text-[#7eaeb5] transition">Home</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-[#7eaeb5] transition">Products</a></li>
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

</body>
</html>
