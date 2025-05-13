<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floralish - Register</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .logo-text {
            font-family: 'Pacifico', cursive;
            font-size: 2.5rem;
        }
        .register-card {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
        }
        /* Animasi untuk popup */
        #termsPopup .bg-white {
            transform: scale(0.95);
            opacity: 0;
            transition: all 0.3s ease-out;
        }
        
        #termsPopup .bg-white.scale-100 {
            transform: scale(1);
            opacity: 1;
        }
        
        /* Animasi untuk overlay */
        #termsOverlay {
            opacity: 0;
            transition: opacity 0.3s ease-out;
        }
        
        #termsOverlay.opacity-100 {
            opacity: 1;
        }

        /* Perbaikan untuk konten popup */
        .terms-content {
            opacity: 1 !important;
            transform: none !important;
        }
        
        /* Animasi untuk dialog */
        dialog {
            transition: opacity 0.3s ease-out;
        }
        
        dialog::backdrop {
            transition: opacity 0.3s ease-out;
        }
        
        dialog[open] {
            animation: dialog-open 0.3s ease-out;
        }
        
        @keyframes dialog-open {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        dialog.closing {
            animation: dialog-close 0.3s ease-out;
        }
        
        @keyframes dialog-close {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(0.95);
            }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="register-card w-full max-w-md p-8">
        <div class="text-center mb-8">
            <h1 class="logo-text text-primary">Floralish.</h1>
            <p class="text-gray-600 mt-2">Buat Akun Baru</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops! Ada kesalahan:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" required>
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" required>
                <label for="terms" class="ml-2 block text-sm text-gray-700">
                    Saya setuju dengan <button type="button" id="openTermsBtn" class="text-primary hover:text-primary-dark font-semibold">Syarat dan Ketentuan</button>
                </label>
            </div>
            
            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Daftar
                </button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-primary hover:text-primary-dark font-semibold">Masuk sekarang</a>
            </p>
        </div>
    </div>

    <!-- Dialog Syarat dan Ketentuan -->
    <dialog id="termsDialog" class="rounded-lg shadow-xl p-0 w-full max-w-2xl">
        <div class="flex flex-col h-full">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-primary to-secondary">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-white">Syarat dan Ketentuan</h3>
                    <button type="button" id="closeTermsBtn" class="text-white hover:text-gray-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4 overflow-y-auto" style="max-height: 60vh;">
                <div class="space-y-4">
                    <div>
                        <h4 class="text-lg font-medium text-gray-900">1. Pendahuluan</h4>
                        <p class="mt-2 text-gray-600">Selamat datang di Floralish. Dengan mengakses dan menggunakan layanan kami, Anda menyetujui untuk terikat oleh syarat dan ketentuan berikut.</p>
                    </div>

                    <div>
                        <h4 class="text-lg font-medium text-gray-900">2. Penggunaan Layanan</h4>
                        <p class="mt-2 text-gray-600">Anda setuju untuk menggunakan layanan kami hanya untuk tujuan yang sah dan sesuai dengan semua hukum dan peraturan yang berlaku.</p>
                    </div>

                    <div>
                        <h4 class="text-lg font-medium text-gray-900">3. Akun Pengguna</h4>
                        <p class="mt-2 text-gray-600">Untuk menggunakan layanan kami, Anda harus membuat akun dengan informasi yang akurat dan lengkap.</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex justify-end">
                    <button type="button" id="agreeTermsBtn" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-opacity-90">
                        Saya Setuju
                    </button>
                </div>
            </div>
        </div>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dialog = document.getElementById('termsDialog');
            const openBtn = document.getElementById('openTermsBtn');
            const closeBtn = document.getElementById('closeTermsBtn');
            const agreeBtn = document.getElementById('agreeTermsBtn');

            // Buka dialog
            openBtn.addEventListener('click', () => {
                dialog.showModal();
                document.body.style.overflow = 'hidden';
            });

            // Tutup dialog
            function closeDialog() {
                dialog.classList.add('closing');
                
                // Tunggu animasi selesai sebelum menutup dialog
                dialog.addEventListener('animationend', function closeHandler() {
                    dialog.classList.remove('closing');
                    dialog.close();
                    document.body.style.overflow = '';
                    dialog.removeEventListener('animationend', closeHandler);
                }, { once: true });
            }

            closeBtn.addEventListener('click', closeDialog);
            agreeBtn.addEventListener('click', closeDialog);

            // Tutup dialog dengan Escape
            dialog.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closeDialog();
                }
            });

            // Tutup dialog ketika klik di luar
            dialog.addEventListener('click', (e) => {
                if (e.target === dialog) {
                    closeDialog();
                }
            });
        });
    </script>
</body>
</html> 