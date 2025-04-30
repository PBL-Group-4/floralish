@extends('admin.layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Pengguna</h1>
        <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:text-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                        class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary @error('name') border-red-500 @enderror"
                        placeholder="Masukkan nama">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary @error('email') border-red-500 @enderror"
                        placeholder="Masukkan email">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select name="role_id" id="role_id" 
                        class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-primary @error('role_id') border-red-500 @enderror">
                        <option value="9999" {{ old('role_id', $user->role_id) == 9999 ? 'selected' : '' }}>User</option>
                        <option value="9998" {{ old('role_id', $user->role_id) == 9998 ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 