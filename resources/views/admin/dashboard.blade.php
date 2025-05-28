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
        
        /* Notification Styles */
        .notification-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            width: 320px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 50;
            margin-top: 0.5rem;
        }
        .notification-dropdown.active {
            display: block;
        }
        .notification-item {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.2s;
        }
        .notification-item:hover {
            background-color: #f9fafb;
        }
        .notification-item.unread {
            background-color: #f0f9ff;
        }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ef4444;
            color: white;
            border-radius: 9999px;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
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
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center text-white bg-white bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </div>
                <div class="px-4 py-2">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center text-white hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Produk
                    </a>
                </div>
                <div class="px-4 py-2">
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center text-white hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Pesanan
                    </a>
                </div>
                <div class="px-4 py-2">
                    <a href="{{ route('admin.users.index') }}" class="flex items-center text-white hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Pengguna
                    </a>
                </div>
                <div class="px-4 py-2">
                    <a href="{{ route('admin.settings') }}" class="flex items-center text-white hover:bg-white hover:bg-opacity-20 rounded-lg px-4 py-3">
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
                            <button id="notificationButton" class="flex items-center text-gray-500 hover:text-gray-700 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span id="notificationBadge" class="notification-badge hidden">0</span>
                            </button>
                            <div id="notificationDropdown" class="notification-dropdown">
                                <div class="p-3 border-b border-gray-200">
                                    <h3 class="font-semibold text-gray-800">Notifications</h3>
                                </div>
                                <div id="notificationList" class="max-h-96 overflow-y-auto">
                                    <!-- Notifications will be dynamically added here -->
                                </div>
                            </div>
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
                        <h1 class="text-2xl font-semibold text-gray-800">Selamat Datang, {{ Auth::guard('admin')->user()->name }}!</h1>
                        <p class="text-gray-600 mt-2">Berikut adalah ringkasan aktivitas dan statistik Floralish hari ini.</p>
                    </div>
                    
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="stat-card rounded-lg shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Produk</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $totalProducts }}</p>
                                </div>
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
                                    <p class="text-sm font-medium text-gray-500">Total User</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $totalUsers }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="stat-card rounded-lg shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-primary bg-opacity-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Admin</p>
                                    <p class="text-2xl font-semibold text-gray-800">{{ $totalAdmins }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Popular Products -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Produk Terbaru</h2>
                            <a href="{{ route('admin.products.index') }}" class="text-primary hover:text-opacity-80 text-sm font-medium">Lihat Semua</a>
                        </div>
                        <div class="space-y-4">
                            @foreach($popularProducts as $product)
                            <div class="flex items-center">
                                <div class="h-12 w-12 rounded-md bg-gray-200 flex-shrink-0 overflow-hidden">
                                    <img src="{{ asset($product->image) ?? 'https://via.placeholder.com/100' }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-sm font-medium text-gray-900">{{ $product->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ Str::limit($product->description, 50) }}</p>
                                </div>
                                <div class="ml-4">
                                    <span class="text-sm font-medium text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notificationButton = document.getElementById('notificationButton');
            const notificationDropdown = document.getElementById('notificationDropdown');
            const notificationBadge = document.getElementById('notificationBadge');
            const notificationList = document.getElementById('notificationList');
            let unreadCount = 0;

            // Function to fetch notifications
            async function fetchNotifications() {
                try {
                    const response = await fetch('{{ route("admin.notifications.index") }}');
                    const data = await response.json();
                    
                    // Update unread count
                    unreadCount = data.unread_count;
                    updateNotificationBadge();
                    
                    // Update notification list
                    notificationList.innerHTML = '';
                    data.notifications.forEach(notification => {
                        const notificationItem = createNotificationElement(notification);
                        notificationList.appendChild(notificationItem);
                    });
                } catch (error) {
                    console.error('Error fetching notifications:', error);
                }
            }

            // Function to create notification element
            function createNotificationElement(notification) {
                const notificationItem = document.createElement('div');
                notificationItem.className = `notification-item ${notification.is_read ? '' : 'unread'}`;
                notificationItem.dataset.id = notification.id;
                
                notificationItem.innerHTML = `
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-800">${notification.message}</p>
                            <p class="text-xs text-gray-500 mt-1">${notification.time_ago}</p>
                        </div>
                    </div>
                `;

                // Add click handler to mark as read
                if (!notification.is_read) {
                    notificationItem.addEventListener('click', () => markAsRead(notification.id));
                }

                return notificationItem;
            }

            // Function to mark notification as read
            async function markAsRead(notificationId) {
                try {
                    const response = await fetch(`{{ route('admin.notifications.mark-read', '') }}/${notificationId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    });

                    if (response.ok) {
                        const notificationItem = notificationList.querySelector(`[data-id="${notificationId}"]`);
                        if (notificationItem) {
                            notificationItem.classList.remove('unread');
                            unreadCount = Math.max(0, unreadCount - 1);
                            updateNotificationBadge();
                        }
                    }
                } catch (error) {
                    console.error('Error marking notification as read:', error);
                }
            }

            // Function to mark all notifications as read
            async function markAllAsRead() {
                try {
                    const response = await fetch('{{ route("admin.notifications.mark-all-read") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    });

                    if (response.ok) {
                        document.querySelectorAll('.notification-item.unread').forEach(item => {
                            item.classList.remove('unread');
                        });
                        unreadCount = 0;
                        updateNotificationBadge();
                    }
                } catch (error) {
                    console.error('Error marking all notifications as read:', error);
                }
            }

            // Toggle notification dropdown
            notificationButton.addEventListener('click', async function(e) {
                e.stopPropagation();
                notificationDropdown.classList.toggle('active');
                
                if (notificationDropdown.classList.contains('active')) {
                    await fetchNotifications();
                    await markAllAsRead();
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!notificationDropdown.contains(e.target) && !notificationButton.contains(e.target)) {
                    notificationDropdown.classList.remove('active');
                }
            });

            // Function to update notification badge
            function updateNotificationBadge() {
                if (unreadCount > 0) {
                    notificationBadge.textContent = unreadCount;
                    notificationBadge.classList.remove('hidden');
                } else {
                    notificationBadge.classList.add('hidden');
                }
            }

            // Fetch notifications every 30 seconds
            setInterval(fetchNotifications, 30000);

            // Initial fetch
            fetchNotifications();
        });
    </script>
</body>
</html> 