@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Profile Settings</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Profile Settings Form -->
        <form action="{{ route('profile.settings.update') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 mb-8">
            @csrf
            @method('PUT')
            <h2 class="text-xl font-semibold mb-6">Profile Information</h2>

            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary @error('phone') border-red-500 @enderror">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                <textarea name="address" id="address" rows="3" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary @error('address') border-red-500 @enderror">{{ old('address', $user->address) }}</textarea>
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-dark transition-colors duration-300">
                    Save Profile Changes
                </button>
            </div>
        </form>

        <!-- Password Change Form -->
        <form action="{{ route('profile.settings.update-password') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')
            <h2 class="text-xl font-semibold mb-6">Change Password</h2>
            
            <div class="mb-6">
                <label for="current_password" class="block text-gray-700 font-medium mb-2">Current Password</label>
                <input type="password" name="current_password" id="current_password" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary @error('current_password') border-red-500 @enderror">
                @error('current_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="new_password" class="block text-gray-700 font-medium mb-2">New Password</label>
                <input type="password" name="new_password" id="new_password" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary @error('new_password') border-red-500 @enderror">
                @error('new_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="new_password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-dark transition-colors duration-300">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 