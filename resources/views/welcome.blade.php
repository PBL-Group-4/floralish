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
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }
        .container {
            width: 100%;
            max-width: 100%;
            padding-left: clamp(1rem, 5vw, 2rem);
            padding-right: clamp(1rem, 5vw, 2rem);
            margin: 0 auto;
        }
        .section-padding {
            padding-top: clamp(2rem, 5vw, 4rem);
            padding-bottom: clamp(2rem, 5vw, 4rem);
        }
        .grid-responsive {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr));
            gap: clamp(1rem, 3vw, 2rem);
        }
        .flex-responsive {
            display: flex;
            flex-wrap: wrap;
            gap: clamp(1rem, 3vw, 2rem);
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
            z-index: 1000;
            border-radius: 4px;
            margin-top: 0.5rem;
            padding-top: 0.5rem;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        /* Add padding to create hover area */
        .dropdown::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            height: 20px;
            background: transparent;
        }
        .dropdown-item {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            position: relative;
            z-index: 1000;
        }
        .dropdown-item:hover {
            background-color: #f1f1f1;
        }
        .dropdown-divider {
            height: 1px;
            background-color: #e5e5e5;
            margin: 4px 0;
        }
        .navbar-container {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
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
        .dropdown-button {
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        
        /* Navbar Styles for 828x1792 */
        @media (max-width: 828px) {
            .navbar-container {
                padding: 0.5rem 1rem;
            }
            
            .nav-dropdown {
                position: relative;
                display: inline-block;
            }
            
            .nav-dropdown-content {
                display: none;
                position: absolute;
                right: 0;
                background-color: white;
                min-width: 200px;
                box-shadow: 0 8px 16px rgba(0,0,0,0.1);
                border-radius: 8px;
                z-index: 1000;
                padding: 0.5rem 0;
            }
            
            .nav-dropdown:hover .nav-dropdown-content {
                display: block;
            }
            
            .nav-dropdown-item {
                padding: 0.75rem 1rem;
                color: #333;
                text-decoration: none;
                display: block;
                transition: background-color 0.3s;
            }
            
            .nav-dropdown-item:hover {
                background-color: #f5f5f5;
            }
            
            .nav-dropdown-divider {
                height: 1px;
                background-color: #e5e5e5;
                margin: 0.5rem 0;
            }
            
            .nav-dropdown-button {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem;
                cursor: pointer;
                color: #333;
                transition: color 0.3s;
            }
            
            .nav-dropdown-button:hover {
                color: #90C9CF;
            }
            
            .nav-dropdown-button i {
                transition: transform 0.3s;
            }
            
            .nav-dropdown:hover .nav-dropdown-button i {
                transform: rotate(180deg);
            }
        }
        .circle-border {
            width: 200px;
            height: 200px;
            border: 10px solid #6B9CA6;
            border-radius: 50%;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            overflow: hidden;
        }

        .inner-image {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            position: relative;
            z-index: 2;
        }

        /* Responsive styles for different screen sizes */
        @media (max-width: 1024px) {
            .circle-border {
                width: 180px !important;
                height: 180px !important;
                border-width: 8px !important;
            }

            .inner-image {
                width: 160px !important;
                height: 160px !important;
            }
        }

        @media (max-width: 768px) {
            .circle-border {
                width: 150px !important;
                height: 150px !important;
                border-width: 6px !important;
            }

            .inner-image {
                width: 130px !important;
                height: 130px !important;
            }
        }

        @media (max-width: 640px) {
            .circle-border {
                width: 120px !important;
                height: 120px !important;
                border-width: 5px !important;
            }

            .inner-image {
                width: 100px !important;
                height: 100px !important;
            }
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <!-- Bagian Header -->
    <header class="bg-white shadow-sm w-full">
        <div class="container flex justify-between items-center py-4">
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
                <div class="dropdown {{ Auth::check() ? 'hidden' : '' }}" id="profileDropdown">
                    <button class="dropdown-button flex items-center text-black hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </button>
                    <div class="dropdown-content" id="profileDropdownContent">
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
                @auth
                    <a href="{{ route('whatsapp.send') }}" class="flex items-center text-black hover:text-primary ml-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center text-black hover:text-primary ml-5" title="Login untuk menghubungi kami via WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                @endauth
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

    <!-- Bagian Hero -->
    <section class="bg-gradient-to-br from-primary to-secondary w-full section-padding">
        <div class="container">
            <div class="grid-responsive items-center">
                <div class="space-y-6">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold">
                        <span class="text-black">Pesan</span> <span class="text-red-600">Bunga</span>
                    </h1>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-black">
                        Mudah & Cepat
                    </h2>
                    <p class="text-lg md:text-xl text-black">
                        Temukan keindahan dan keharuman bunga untuk setiap momen spesial Anda.
                    </p>
                    <button id="startButton" class="bg-button hover:bg-opacity-90 text-black font-semibold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                        Discover our Product
                    </button>
                    <div class="flex-responsive justify-between mt-8">
                        <div class="stat-item">
                            <div class="stat-value" id="orderCount">0</div>
                            <div class="stat-label">Total pesanan</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value" id="regionCount">0</div>
                            <div class="stat-label">Wilayah</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value" id="ratingValue">0</div>
                            <div class="stat-label">Rating</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="window-frame w-full max-w-md">
                        <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=512&h=512&q=80" 
                             alt="Buket Bunga Indah"
                             class="w-full h-auto object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Bagian Kategori -->
    <section class="bg-white section-padding">
        <div class="container">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-8">Kategori Produk</h2>
            <div class="flex flex-col md:flex-row justify-center items-center md:gap-12 space-y-12 md:space-y-0">
                <!-- Kategori 1 -->
                <div class="text-center">
                    <div class="circle-border">
                        <img class="inner-image" src="{{ asset('image/bukethand1.png') }}" alt="Bunga" />
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Bunga</h3>
                </div>

                <!-- Kategori 2 -->
                <div class="text-center">
                    <div class="circle-border">
                        <img class="inner-image" src="{{ asset('image/standing flower1.png') }}" alt="Karangan Bunga Papan" />
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Karangan Bunga Papan</h3>
                </div>

                <!-- Kategori 3 -->
                <div class="text-center">
                    <div class="circle-border">
                        <img class="inner-image" src="{{ asset('image/cake.jpg') }}" alt="Kado & Cakes" />
                    </div>
                    <h3 class="text-lg font-semibold mt-4">Kado & Cakes</h3>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Bagian Catalog Produk -->
    <section class="bg-white section-padding">
        <div class="container">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-8">Catalog Produk</h2>
            
            <!-- Filter Form -->
            <form id="filterForm" class="flex-responsive mb-8">
                <div class="flex-1 min-w-[200px] flex items-center gap-2">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari produk..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <button type="button"
                            class="flex items-center gap-2 bg-[#8dc6d3] text-white text-[18px] font-normal rounded-[8px] px-6 py-2 cursor-pointer hover:bg-[#7ab5c2] transition-colors duration-300"
                            onclick="handleSearchClick()">
                        <i class="fas fa-search text-white text-[18px]"></i>
                        Cari
                    </button>
                </div>
                <div class="w-[200px]">
                    <select name="category" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category }}" 
                                    {{ request('category') == $category->category ? 'selected' : '' }}>
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-[200px]">
                    <select name="sort" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Urutkan</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                            Harga: Rendah ke Tinggi
                        </option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                            Harga: Tinggi ke Rendah
                        </option>
                    </select>
                </div>
            </form>

            <!-- Products Grid -->
            <div class="space-y-16 mt-12">
                <!-- Bunga Section -->
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-800 mb-8">Bunga</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($products->where('category', 'Bunga')->take(4) as $product)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                                <a href="{{ route('products.show', $product) }}" class="block">
                                    <div class="aspect-w-1 aspect-h-1">
                                        <img src="{{ asset($product->image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                            {{ Str::limit($product->description, 50) }}
                                        </p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-primary font-bold">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                            <a href="{{ route('products.show', $product) }}" 
                                               class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-dark transition-all duration-300">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Karangan Bunga Papan Section -->
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-800 mb-8">Karangan Bunga Papan</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($products->where('category', 'Karangan Bunga Papan')->take(4) as $product)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                                <a href="{{ route('products.show', $product) }}" class="block">
                                    <div class="aspect-w-1 aspect-h-1">
                                        <img src="{{ asset($product->image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                            {{ Str::limit($product->description, 50) }}
                                        </p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-primary font-bold">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                            <a href="{{ route('products.show', $product) }}" 
                                               class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-dark transition-all duration-300">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Kado & Cakes Section -->
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-800 mb-8">Kado & Cakes</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($products->where('category', 'Kado & Cakes')->take(4) as $product)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                                <a href="{{ route('products.show', $product) }}" class="block">
                                    <div class="aspect-w-1 aspect-h-1">
                                        <img src="{{ asset($product->image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                            {{ Str::limit($product->description, 50) }}
                                        </p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-primary font-bold">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                            <a href="{{ route('products.show', $product) }}" 
                                               class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-dark transition-all duration-300">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="bg-white section-padding">
        <div class="container">
            <div class="bg-white p-6">
                <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-md p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    
                    <!-- Fitur: Gratis Ongkir -->
                    <div class="flex items-start gap-4">
                        <div class="text-[#7eaeb5] text-3xl flex-shrink-0 mt-1">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-base leading-5">Gratis Ongkir</h3>
                            <p class="text-gray-600 text-sm leading-5">Free Ongkir Pembelian Didalam Kota</p>
                        </div>
                    </div>

                    <!-- Fitur: Jangkauan Luas -->
                    <div class="flex items-start gap-4">
                        <div class="text-[#7eaeb5] text-3xl flex-shrink-0 mt-1">
                            <i class="far fa-map"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-base leading-5">Jangkauan Luas</h3>
                            <p class="text-gray-600 text-sm leading-5">Kirim ke 200+ Kota di Indonesia</p>
                        </div>
                    </div>

                    <!-- Fitur: Keamanan Pembeli -->
                    <div class="flex items-start gap-4">
                        <div class="text-[#7eaeb5] text-3xl flex-shrink-0 mt-1">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-base leading-5">Keamanan Pembeli</h3>
                            <p class="text-gray-600 text-sm leading-5">Menjamin keamanan Data pembeli</p>
                        </div>
                    </div>

                    <!-- Fitur: Garansi Waktu -->
                    <div class="flex items-start gap-4">
                        <div class="text-[#7eaeb5] text-3xl flex-shrink-0 mt-1">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-base leading-5">Garansi Waktu</h3>
                            <p class="text-gray-600 text-sm leading-5">Pesanan anda pasti tiba sesuai Jadwal</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Offline Store / Lokasi -->
    <section class="bg-white section-padding">
        <div class="container">
            <h3 class="text-[#7eaeb5] text-center text-xl font-semibold tracking-widest mb-8">
                Temukan Offline Store kami
            </h3>
            <div class="grid-responsive">
                @foreach(['Batam','Jakarta','Bandung','Surabaya','Medan','Padang','Palembang','Pekanbaru','Pontianak','Kupang','Ambon','Manado','Makassar','Banjarmasin','Samarinda'] as $city)
                    <a href="{{ route('products.index', ['city' => strtolower($city)]) }}" 
                       class="btn-store bg-[#7eaeb5] rounded-full shadow-lg py-3 px-8 text-white hover:brightness-90 transition text-sm font-medium text-center">
                        {{ $city }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Overlay Transisi -->
    <div id="transitionOverlay" class="transition-overlay">
        <div class="logo-container">
            <div class="flower-icon">🌸</div>
            <div class="logo-text" style="font-size: 3rem;">Floralish.</div>
            <div class="logo-subtext">Menuju ke halaman Produk...</div>  
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

        document.getElementById('startButton').addEventListener('click', function() {
            // Tampilkan overlay transisi
            const overlay = document.getElementById('transitionOverlay');
            overlay.style.display = 'flex';
            overlay.style.opacity = '1';
            
            // Setelah animasi selesai, arahkan ke halaman produk
            setTimeout(function() {
                window.location.href = "{{ route('products.index') }}";
            }, 2000);
        });

        // Profile Dropdown Behavior
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.getElementById('profileDropdown');
            const dropdownContent = document.getElementById('profileDropdownContent');
            let isDropdownVisible = false;
            let hoverTimeout;

            function showDropdown() {
                clearTimeout(hoverTimeout);
                dropdownContent.classList.add('show');
                isDropdownVisible = true;
            }

            function hideDropdown() {
                if (!isDropdownVisible) return;
                hoverTimeout = setTimeout(() => {
                    dropdownContent.classList.remove('show');
                    isDropdownVisible = false;
                }, 300); // 300ms delay before hiding
            }

            // Show dropdown on hover
            dropdown.addEventListener('mouseenter', showDropdown);
            dropdown.addEventListener('mouseleave', hideDropdown);

            // Toggle dropdown on click
            dropdown.querySelector('.dropdown-button').addEventListener('click', function(e) {
                e.stopPropagation();
                if (isDropdownVisible) {
                    dropdownContent.classList.remove('show');
                    isDropdownVisible = false;
                } else {
                    showDropdown();
                }
            });

            // Keep dropdown visible when hovering over content
            dropdownContent.addEventListener('mouseenter', showDropdown);
            dropdownContent.addEventListener('mouseleave', hideDropdown);

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdownContent.classList.remove('show');
                    isDropdownVisible = false;
                }
            });
        });

        // Mencegah form submit saat menekan enter di input pencarian
        document.querySelector('input[name="search"]').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('filterForm').submit();
            }
        });

        function handleSearchClick() {
            // Submit form pencarian
            document.getElementById('filterForm').submit();
        }
    </script>

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

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/682c477148300f190da7003a/1irmfe5jb';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
