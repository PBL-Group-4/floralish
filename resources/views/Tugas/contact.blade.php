<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Floralish - Halaman Kontak</title>
    
    <!-- Stylesheet eksternal -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&family=Roboto+Mono&family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    
    <!-- Konfigurasi Tailwind CSS -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#90C9CF',
                        secondary: '#CDE6E8',
                        button: '#E6F0F2',
                        accent: '#7eaeb5',
                        accentHover: '#6a9ba3',
                        formBg: '#d1f0f5'
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                        pacifico: ['Pacifico', 'cursive'],
                        slab: ['Roboto Slab', 'serif']
                    }
                }
            }
        }
    </script>
    
    <!-- Stylesheet internal -->
    <style>
        /* Gaya Dasar */
        body {
            font-family: 'Poppins', sans-serif;
            background: #8dc6db;
        }
        
        .logo-text {
            font-family: 'Pacifico', cursive;
            font-size: 2.75rem;
        }
        
        /* Gaya Menu Mobile */
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
            right: -100%;
            width: 80%;
            max-width: 400px;
            height: 100%;
            background-color: white;
            z-index: 50;
            transition: right 0.3s ease;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        }
        
        .mobile-menu.active {
            right: 0;
        }
        
        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }
        
        .mobile-menu-close {
            font-size: 1.5rem;
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
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #eee;
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
        
        /* Gaya Dropdown */
        .dropdown {
            position: relative;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 4px;
            z-index: 1;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
        
        .dropdown-item {
            display: block;
            padding: 0.75rem 1rem;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .dropdown-item:hover {
            background-color: #f5f5f5;
        }
        
        .dropdown-divider {
            height: 1px;
            background-color: #eee;
            margin: 0.5rem 0;
        }
        
        /* Animasi Marquee */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        .animate-marquee {
            animation: marquee 30s linear infinite;
        }
        
        /* Gaya Khusus Halaman Kontak */
        .kontak-container {
            display: flex;
            min-height: 600px;
            width: 100%;
            background: none;
            box-shadow: none;
            border-radius: 0;
        }
        
        /* Bagian Kiri - Info Kontak */
        .kontak-kiri {
            width: 80%;
            background-image: url('https://images.pexels.com/photos/5894075/pexels-photo-5894075.jpeg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 4rem 3rem;
            position: relative;
            clip-path: none;
        }
        
        .kontak-kiri::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.45);
            z-index: 1;
        }
        
        .kontak-kiri-konten {
            position: relative;
            z-index: 2;
        }
        
        /* Bagian Kanan - Formulir */
        .kontak-kanan {
            width: 80%;
            background-color: #d1f0f5;
            padding: 4rem 3rem;
            clip-path: none;
        }
        
        /* Judul Bagian */
        .judul-kontak {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            font-family: 'Roboto Slab', serif;
        }
        
        /* Info Kontak */
        .info-kontak {
            margin-bottom: 1.5rem;
        }
        
        .info-kontak p:first-child {
            font-weight: bold;
            margin-bottom: 0.25rem;
        }
        
        /* Ikon Media Sosial */
        .ikon-sosmed {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .ikon-sosmed-item {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            color: white;
            transition: all 0.3s ease;
        }
        
        .ikon-sosmed-item:hover {
            background-color: #90C9CF;
        }
        
        /* Formulir Kontak */
        .formulir-kontak input,
        .formulir-kontak select,
        .formulir-kontak textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        
        .baris-form {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .baris-form > * {
            flex: 1;
        }
        
        .formulir-kontak textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .tombol-kirim {
            background-color: #7eaeb5;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .tombol-kirim:hover {
            background-color: #6a9ba3;
        }
        
        /* Media Query untuk Responsivitas */
        @media (max-width: 768px) {
            .kontak-container {
                flex-direction: column;
            }
            
            .kontak-kiri {
                clip-path: polygon(0 0, 92% 0, 100% 100%, 0 100%)
            }
            .kontak-kanan {
                width: 100%;
                clip-path: polygon(10% 0, 100% 0, 100% 100%, 0 100%);
            }
            
        }
    </style>
</head>
<body class="bg-[#8dc6db] min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 navbar-container flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-black logo-text hover:text-primary transition-colors duration-300 navbar-logo">Floralish.</a>
            
            <!-- Navigasi Desktop -->
            <nav class="hidden md:flex items-center">
                <ul class="flex space-x-6 mr-6">
                    <li><a href="/" class="text-black hover:text-primary">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-black hover:text-primary">Products</a></li>
                    <li><a href="/profile" class="text-black hover:text-primary">About</a></li>
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
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">My Orders</a>
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
            <a href="/profile" class="mobile-menu-item">About</a>
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
    <!-- Konten Utama - Halaman Kontak -->
    <main class="flex-grow flex items-center justify-center p-6">
        <div class="kontak-container bg-white shadow-lg rounded-lg overflow-hidden max-w-7xl w-full">
            <!-- Bagian Kiri - Informasi Kontak -->
            <section class="kontak-kiri">
                <div class="kontak-kiri-konten">
                    <h2 class="judul-kontak">Contact us</h2>
                    <p class="mb-8">
                        Keindahan ada dalam setiap kelopak bunga yang kami rangkai.
                        Percayakan momen berharga Anda pada Floralish.id, di mana kreativitas bertemu
                        dengan ketelitian untuk menciptakan karya yang memikat hati.
                    </p>
                    
                    <div class="info-kontak">
                        <p>Address :</p>
                        <p>Jl. Melati Indah No. 28, Kebayoran Baru, Jakarta Selatan 12160, Indonesia</p>
                    </div>
                    
                    <div class="info-kontak">
                        <p>Phone :</p>
                        <p>+62 822-8531-0010</p>
                    </div>
                    
                    <div class="info-kontak">
                        <p>Email :</p>
                        <p>Florish.id@gmail.com</p>
                    </div>
                    
                    <div class="ikon-sosmed">
                        <a href="#" class="ikon-sosmed-item" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="ikon-sosmed-item" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="ikon-sosmed-item" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </section>
            
            <!-- Bagian Kanan - Formulir Kontak -->
            <section class="kontak-kanan">
                <h2 class="judul-kontak">Get In Touch</h2>
                <p class="font-bold mb-8">
                    Setiap rangkaian kami adalah simfoni warna dan tekstur yang mengalir dalam
                    harmoni sempurna. Hubungi Florish.id dan biarkan kami mengubah karya yang menggema dalam
                    kenangan, melampaui batas waktu dan musim.
                </p>
                
                <form class="formulir-kontak" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="baris-form">
                        <div class="w-full">
                            <input type="text" name="name" placeholder="Nama" aria-label="Nama" required 
                                class="@error('name') border-red-500 @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <input type="email" name="email" placeholder="Email" aria-label="Email" required
                                class="@error('email') border-red-500 @enderror"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="baris-form">
                        <div class="w-full">
                            <select name="category" aria-label="Kategori" required
                                class="@error('category') border-red-500 @enderror">
                                <option value="">Kategori</option>
                                <option value="wedding" {{ old('category') == 'wedding' ? 'selected' : '' }}>Pernikahan</option>
                                <option value="birthday" {{ old('category') == 'birthday' ? 'selected' : '' }}>Ulang Tahun</option>
                                <option value="graduation" {{ old('category') == 'graduation' ? 'selected' : '' }}>Wisuda</option>
                                <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <select name="budget" aria-label="Budget" required
                                class="@error('budget') border-red-500 @enderror">
                                <option value="">Budget</option>
                                <option value="under_200k" {{ old('budget') == 'under_200k' ? 'selected' : '' }}>Di bawah Rp 200.000</option>
                                <option value="200k_500k" {{ old('budget') == '200k_500k' ? 'selected' : '' }}>Rp 200.000 - Rp 500.000</option>
                                <option value="500k_1m" {{ old('budget') == '500k_1m' ? 'selected' : '' }}>Rp 500.000 - Rp 1.000.000</option>
                                <option value="above_1m" {{ old('budget') == 'above_1m' ? 'selected' : '' }}>Di atas Rp 1.000.000</option>
                            </select>
                            @error('budget')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full">
                        <textarea name="message" placeholder="Pesan..." aria-label="Pesan" required
                            class="@error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="tombol-kirim" id="submitButton">
                        <span class="button-text">Kirim Pesan</span>
                        <span class="loading-spinner hidden">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </form>
            </section>
        </div>
    </main>

    <!-- Footer -->

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
                    <li><a href="/welcome" class="text-gray-600 hover:text-[#7eaeb5] transition">Home</a></li>
                    <li><a href="/produk" class="text-gray-600 hover:text-[#7eaeb5] transition">Products</a></li>
                    <li><a href="/profile" class="text-gray-600 hover:text-[#7eaeb5] transition">About Us</a></li>
                    <li><a href="contact" class="text-gray-600 hover:text-[#7eaeb5] transition">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact Us</h3>
                <ul class="space-y-2">
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-map-marker-alt w-5 text-[#7eaeb5]"></i>
                        <span>Jl. Melati Indah No. 28, Kebayoran Baru, Jakarta Selatan 12160, Indonesia</span>
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-phone w-5 text-[#7eaeb5]"></i>
                        <span>+62 822-8531-0010</span>
                    </li>
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-envelope w-5 text-[#7eaeb5]"></i>
                        <span>Florish.id@gmail.com</span>
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

    <!-- Script JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileMenuClose = document.getElementById('mobileMenuClose');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

            function openMobileMenu() {
                mobileMenu.style.display = 'block';
                mobileMenuOverlay.style.display = 'block';
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

            // Form Submit Handler
            const form = document.querySelector('.formulir-kontak');
            const submitButton = document.getElementById('submitButton');
            const buttonText = submitButton.querySelector('.button-text');
            const loadingSpinner = submitButton.querySelector('.loading-spinner');

            form.addEventListener('submit', function() {
                buttonText.classList.add('hidden');
                loadingSpinner.classList.remove('hidden');
                submitButton.disabled = true;
            });
        });
    </script>
</body>
</html>
