<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Floralish</title>
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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .logo-text {
            font-family: 'Pacifico', cursive;
            font-size: 1.8rem;
        }
        .sidebar {
            background: linear-gradient(180deg, #90C9CF 0%, #CDE6E8 100%);
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-left: 4px solid #90C9CF;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar w-64 flex-shrink-0 hidden md:block">
            <div class="p-6">
                <h1 class="logo-text text-white">Floralish.</h1>
                <p class="text-white text-sm mt-1">Admin Dashboard</p>
            </div>
            <nav class="mt-6">
                <div class="px-4 py-2">
                    <a href="#" class="flex items-center text-white bg-white bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </div>
                <div class="px-4 py-2">
                    <a href="#" class="flex items-center text-white hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Produk
                    </a>
                </div>
                <div class="px-4 py-2">
                    <a href="#" class="flex items-center text-white hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Pesanan
                    </a>
                </div>
                <div class="px-4 py-2">
                    <a href="#" class="flex items-center text-white hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Pengguna
                    </a>
                </div>
                <div class="px-4 py-2">
                    <a href="#" class="flex items-center text-white hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pengaturan
                    </a>
                </div>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button class="md:hidden text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800 ml-4">Dashboard</h2>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <button class="flex items-center text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                            </button>
                        </div>
                        <div class="ml-4">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4">
                <div class="container mx-auto">
                    <!-- Welcome Section -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h1 class="text-2xl font-semibold text-gray-800">Selamat Datang, Admin!</h1>
                        <p class="text-gray-600 mt-2">Berikut adalah ringkasan aktivitas dan statistik Floralish hari ini.</p>
                    </div>
                    
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="stat-card rounded-lg shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Pesanan</p>
                                    <p class="text-2xl font-semibold text-gray-800">128</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-500 text-sm font-medium">+12%</span>
                                <span class="text-gray-500 text-sm ml-2">dari minggu lalu</span>
                            </div>
                        </div>
                        
                        <div class="stat-card rounded-lg shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Pendapatan</p>
                                    <p class="text-2xl font-semibold text-gray-800">Rp 12.5M</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-500 text-sm font-medium">+8%</span>
                                <span class="text-gray-500 text-sm ml-2">dari minggu lalu</span>
                            </div>
                        </div>
                        
                        <div class="stat-card rounded-lg shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Pengguna Baru</p>
                                    <p class="text-2xl font-semibold text-gray-800">42</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-500 text-sm font-medium">+5%</span>
                                <span class="text-gray-500 text-sm ml-2">dari minggu lalu</span>
                            </div>
                        </div>
                        
                        <div class="stat-card rounded-lg shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Pesanan Selesai</p>
                                    <p class="text-2xl font-semibold text-gray-800">98</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-500 text-sm font-medium">+15%</span>
                                <span class="text-gray-500 text-sm ml-2">dari minggu lalu</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Orders -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Pesanan Terbaru</h2>
                            <a href="#" class="text-primary hover:text-opacity-80 text-sm font-medium">Lihat Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Budi Santoso</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Buket Mawar Merah</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 350.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Apr 2024</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-002</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Siti Rahayu</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Box Bunga Lavender</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 450.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Proses</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 Apr 2024</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-003</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ahmad Hidayat</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Papan Bunga Duka</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 1.250.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Dikirim</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Apr 2024</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD-004</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dewi Kusuma</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Hampers Bunga</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp 750.000</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">09 Apr 2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Popular Products -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold text-gray-800">Produk Populer</h2>
                                <a href="#" class="text-primary hover:text-opacity-80 text-sm font-medium">Lihat Semua</a>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="h-12 w-12 rounded-md bg-gray-200 flex-shrink-0 overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="Buket Mawar Merah" class="h-full w-full object-cover">
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <h3 class="text-sm font-medium text-gray-900">Buket Mawar Merah</h3>
                                        <p class="text-sm text-gray-500">Terjual: 128 unit</p>
                                    </div>
                                    <div class="ml-4">
                                        <span class="text-sm font-medium text-gray-900">Rp 350.000</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="h-12 w-12 rounded-md bg-gray-200 flex-shrink-0 overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="Box Bunga Lavender" class="h-full w-full object-cover">
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <h3 class="text-sm font-medium text-gray-900">Box Bunga Lavender</h3>
                                        <p class="text-sm text-gray-500">Terjual: 95 unit</p>
                                    </div>
                                    <div class="ml-4">
                                        <span class="text-sm font-medium text-gray-900">Rp 450.000</span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="h-12 w-12 rounded-md bg-gray-200 flex-shrink-0 overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="Papan Bunga Duka" class="h-full w-full object-cover">
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <h3 class="text-sm font-medium text-gray-900">Papan Bunga Duka</h3>
                                        <p class="text-sm text-gray-500">Terjual: 42 unit</p>
                                    </div>
                                    <div class="ml-4">
                                        <span class="text-sm font-medium text-gray-900">Rp 1.250.000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h2>
                                <a href="#" class="text-primary hover:text-opacity-80 text-sm font-medium">Lihat Semua</a>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="h-8 w-8 rounded-full bg-primary bg-opacity-10 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-900">Pesanan baru <span class="font-medium">#ORD-005</span> dari <span class="font-medium">Rudi Hartono</span></p>
                                        <p class="text-xs text-gray-500">10 menit yang lalu</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-900">Pesanan <span class="font-medium">#ORD-002</span> telah selesai</p>
                                        <p class="text-xs text-gray-500">1 jam yang lalu</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-gray-900">Pengguna baru <span class="font-medium">Siti Aminah</span> telah mendaftar</p>
                                        <p class="text-xs text-gray-500">2 jam yang lalu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html> 