<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings - Floralish</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-4 border-b">
                <h2 class="text-2xl font-bold text-[#7eaeb5]">Floralish</h2>
                <p class="text-sm text-gray-600">Admin Panel</p>
            </div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-home w-6"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-box w-6"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-shopping-cart w-6"></i>
                            <span>Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                            <i class="fas fa-users w-6"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings') }}" class="flex items-center p-2 bg-[#7eaeb5] text-white rounded">
                            <i class="fas fa-cog w-6"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center p-4">
                    <h1 class="text-2xl font-semibold text-gray-800">Settings</h1>
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-800">
                                <img src="https://ui-avatars.com/api/?name=Admin&background=7eaeb5&color=fff" alt="Admin" class="w-8 h-8 rounded-full">
                                <span>Admin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Settings Content -->
            <main class="p-6">
                <div class="max-w-4xl mx-auto">
                    <!-- General Settings -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-semibold mb-4">General Settings</h2>
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Site Name</label>
                                    <input type="text" name="site_name" value="{{ $settings->site_name ?? 'Floralish' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Site Description</label>
                                    <textarea name="site_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">{{ $settings->site_description ?? '' }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Contact Email</label>
                                    <input type="email" name="contact_email" value="{{ $settings->contact_email ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input type="text" name="phone_number" value="{{ $settings->phone_number ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-[#7eaeb5] text-white px-4 py-2 rounded-md hover:bg-[#6a9ba3] transition-colors">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Social Media Settings -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-semibold mb-4">Social Media Links</h2>
                        <form action="{{ route('admin.settings.social.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Instagram</label>
                                    <input type="url" name="instagram" value="{{ $settings->instagram ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Facebook</label>
                                    <input type="url" name="facebook" value="{{ $settings->facebook ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Twitter</label>
                                    <input type="url" name="twitter" value="{{ $settings->twitter ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">TikTok</label>
                                    <input type="url" name="tiktok" value="{{ $settings->tiktok ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-[#7eaeb5] text-white px-4 py-2 rounded-md hover:bg-[#6a9ba3] transition-colors">
                                    Save Social Media Links
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Shipping Settings -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4">Shipping Settings</h2>
                        <form action="{{ route('admin.settings.shipping.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Free Shipping Threshold</label>
                                    <input type="number" name="free_shipping_threshold" value="{{ $settings->free_shipping_threshold ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Default Shipping Cost</label>
                                    <input type="number" name="default_shipping_cost" value="{{ $settings->default_shipping_cost ?? '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7eaeb5] focus:ring focus:ring-[#7eaeb5] focus:ring-opacity-50">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Shipping Partners</label>
                                    <div class="mt-2 space-y-2">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="shipping_partners[]" value="jne" class="rounded border-gray-300 text-[#7eaeb5] focus:ring-[#7eaeb5]">
                                            <span class="ml-2">JNE</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="shipping_partners[]" value="jnt" class="rounded border-gray-300 text-[#7eaeb5] focus:ring-[#7eaeb5]">
                                            <span class="ml-2">JNT</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="shipping_partners[]" value="sicepat" class="rounded border-gray-300 text-[#7eaeb5] focus:ring-[#7eaeb5]">
                                            <span class="ml-2">SiCepat</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-[#7eaeb5] text-white px-4 py-2 rounded-md hover:bg-[#6a9ba3] transition-colors">
                                    Save Shipping Settings
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html> 