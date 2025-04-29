<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Floralish Product</title>
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

<body style="background: linear-gradient(to bottom left, #FCE8D5, #5EA9B7, #E0F7F9); min-height: 100vh;">

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

  <!-- Main-->
  <h1 class="text-4xl ml-28 mt-20 font-semibold text-black whitespace-nowrap">
    Temukan <span class="text-[#2E2E2E]">Buket Bunga</span> terbaik
    <span class="block">untuk setiap momen spesial.</span>
  </h1>

  <!-- Start New flower -->
  <h3 class="text-2xl ml-28 mt-40 font-semibold text-black">
    Temukan <span class="text-[#2E2E2E]">buket</span> terbaru kami.
  </h3>

  <div class="flex space-x-8 overflow-hidden ">

    <!-- Start Card 1 -->
    <div class="relative w-[397px] h-[460px] flex-shrink-0 ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/buketbunga.png') }}" alt="product image" />
      <div class="absolute top-2 left-2 w-full px-9 py-8 text-black">
        <h3 class="text-2xl mb-2 font-bold tracking-tight">Bouquet Hand</h3>
        <h4 class="text-lg font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 1 -->

    <!-- Start Card 2 -->
    <div class="relative w-[397px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/standingflower.png') }}" alt="product image" />
      <div class="absolute top-2 left-2 w-full px-9 py-8 text-black">
        <h3 class="text-2xl mb-2 font-bold tracking-tight">Paper Flower Board</h3>
        <h4 class="text-lg font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 2 -->


    <!-- Start Card 3 -->
    <div class="relative w-[397px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/tableflower.png') }}" alt="product image" />
      <div class="absolute top-2 left-2 w-full px-9 py-8 text-black dark:text-white">
        <h3 class="text-2xl mb-2 font-bold tracking-tight">Table Flower</h3>
        <h4 class="text-lg font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between dark:text-white">
          <span class="text-xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 3 -->
  </div>
  <!-- End New Flower -->


  <!-- Start Paper Flower Board -->
  <h3 class="text-2xl ml-28 mt-40 font-semibold text-black">
    Paper Flower Board. <span class="text-[#2E2E2E]">Wujudkan ucapan dengan kesan mendalam.</span>
  </h3>

  <div class="flex space-x-5 overflow-hidden">

    <!-- Start Card 1 -->
    <div class="relative w-[335px] h-[460px] flex-shrink-0 ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/standingflower.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 text-black">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 1 -->

    <!-- Start Card 2 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/standingflower1.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 text-black">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 2 -->

    <!-- Start Card 3 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/standingflower2.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 text-black">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 3 -->

    <!-- Start Card 4 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/standingflower3.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 text-black">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 4 -->
  </div>
  <!-- End Paper Flower Board -->

  <!-- Start Bouquet Hand -->
  <h3 class="text-2xl ml-28 mt-40 font-semibold text-black">
    Bouquet Hand. <span class="text-[#2E2E2E]">Buket istimewa, untuk yang paling berharga.</span>
  </h3>

  <div class="flex space-x-5 overflow-hidden">

    <!-- Start Card 1 -->
    <div class="relative w-[335px] h-[460px] flex-shrink-0 ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/buketbunga.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 text-black">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 1 -->

    <!-- Start Card 2 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/buketbunga1.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 text-black">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 2 -->

    <!-- Start Card 3 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/buketbunga2.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 text-black">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 3 -->

    <!-- Start Card 4 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/buketbunga3.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 text-black">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>

    <!-- End Card 4 -->
  </div>
  <!-- End Bouquet Hand -->

  <!-- Start Table flower -->
  <h3 class="text-2xl ml-28 mt-40 font-semibold text-black">
    Table flower. <span class="text-[#2E2E2E]">Hadirkan keindahan di meja Anda.</span>
  </h3>

  <div class="flex space-x-5 overflow-hidden">

    <!-- Start Card 1 -->
    <div class="relative w-[335px] h-[460px] flex-shrink-0 ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/tableflower.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 dark:text-white">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between dark:text-white">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 1 -->

    <!-- Start Card 2 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/tableflower2.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 dark:text-white">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between ">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 2 -->

    <!-- Start Card 3 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/tableflower3.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 dark:text-white">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between dark:text-white">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 3 -->

    <!-- Start Card 4 -->
    <div class="relative w-[335px] h-[460px] ml-28 mt-8 rounded-3xl shadow-xl overflow-hidden flex-shrink-0">
      <img class="object-cover w-full h-full" src="{{ asset('image/tableflower4.png') }}" alt="product image" />
      <div class="absolute top-[350px] left-2 w-full px-9 py-8 dark:text-white">
        <h4 class="text-base font-semibold tracking-tight">Nama Bunga</h4>
        <div class="flex items-center justify-between dark:text-white">
          <span class="text-2xl font-semibold">$599</span>
        </div>
      </div>
    </div>
    <!-- End Card 4 -->
  </div>
  <!-- End Table Flower -->
  <!-- End Main -->

</body>

</html>