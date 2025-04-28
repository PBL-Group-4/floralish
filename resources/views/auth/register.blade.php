<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floralish - Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                    }
                }
            }
        }
    </script>
    <style>
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
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-primary to-secondary">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Buat Akun Baru</h2>
                    <p class="text-gray-600 mt-2">Bergabunglah dengan Floralish</p>
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

                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" required>
                    </div>
                    
                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" required>
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            Saya setuju dengan <a href="javascript:void(0)" onclick="openTermsPopup()" class="text-primary hover:text-primary-dark font-semibold">Syarat dan Ketentuan</a>
                        </label>
                    </div>
                    
                    <button type="submit" class="w-full bg-button hover:bg-opacity-90 text-black font-semibold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                        Daftar
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-primary hover:text-primary-dark font-semibold">Masuk sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Overlay untuk popup -->
    <div id="termsOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden opacity-0 transition-opacity duration-300"></div>
    
    <!-- Popup Syarat dan Ketentuan -->
    <div id="termsPopup" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[80vh] overflow-hidden">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Syarat dan Ketentuan Penggunaan</h3>
                <button id="closeTermsPopup" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6 overflow-y-auto max-h-[calc(80vh-80px)]">
                <div class="prose prose-sm max-w-none">
                    <h4 class="text-lg font-semibold mb-3">1. Pendahuluan</h4>
                    <p class="mb-4">Selamat datang di Floralish. Dengan mengakses dan menggunakan layanan kami, Anda menyetujui untuk terikat oleh syarat dan ketentuan berikut. Jika Anda tidak setuju dengan syarat dan ketentuan ini, mohon untuk tidak menggunakan layanan kami.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">2. Definisi</h4>
                    <p class="mb-4">Dalam syarat dan ketentuan ini, "Floralish", "kami", "kita", atau "layanan" merujuk pada platform Floralish dan semua layanan yang disediakan. "Anda" atau "pengguna" merujuk pada individu atau entitas yang mengakses atau menggunakan layanan kami.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">3. Akun Pengguna</h4>
                    <p class="mb-4">Untuk menggunakan layanan kami, Anda harus membuat akun dengan informasi yang akurat dan lengkap. Anda bertanggung jawab untuk menjaga kerahasiaan informasi akun Anda dan semua aktivitas yang terjadi di bawah akun Anda. Anda harus segera memberitahu kami jika ada penggunaan yang tidak sah dari akun Anda.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">4. Penggunaan Layanan</h4>
                    <p class="mb-4">Anda setuju untuk menggunakan layanan kami hanya untuk tujuan yang sah dan sesuai dengan semua hukum dan peraturan yang berlaku. Anda tidak boleh menggunakan layanan kami untuk tujuan yang melanggar hukum atau melanggar hak orang lain.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">5. Konten Pengguna</h4>
                    <p class="mb-4">Anda mempertahankan semua hak atas konten yang Anda kirimkan ke layanan kami. Namun, dengan mengirimkan konten, Anda memberikan kami lisensi untuk menggunakan, menyalin, memodifikasi, dan mendistribusikan konten tersebut dalam kaitannya dengan layanan kami.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">6. Pembatasan</h4>
                    <p class="mb-4">Anda tidak boleh melakukan tindakan yang dapat merusak, menonaktifkan, membebani, atau merusak layanan kami, atau mengganggu penggunaan layanan oleh pengguna lain.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">7. Penghentian</h4>
                    <p class="mb-4">Kami dapat menghentikan atau menangguhkan akses Anda ke layanan kami segera, tanpa pemberitahuan sebelumnya, jika Anda melanggar syarat dan ketentuan ini.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">8. Perubahan Syarat dan Ketentuan</h4>
                    <p class="mb-4">Kami berhak untuk mengubah syarat dan ketentuan ini kapan saja. Perubahan akan efektif segera setelah dipublikasikan di layanan kami. Penggunaan layanan Anda setelah perubahan tersebut menandakan bahwa Anda menerima syarat dan ketentuan yang telah diubah.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">9. Hukum yang Berlaku</h4>
                    <p class="mb-4">Syarat dan ketentuan ini diatur oleh hukum Indonesia. Setiap sengketa yang timbul dari atau terkait dengan syarat dan ketentuan ini akan diselesaikan melalui pengadilan yang berwenang di Indonesia.</p>
                    
                    <h4 class="text-lg font-semibold mb-3">10. Kontak</h4>
                    <p class="mb-4">Jika Anda memiliki pertanyaan tentang syarat dan ketentuan ini, silakan hubungi kami di support@floralish.com.</p>
                </div>
            </div>
            <div class="p-6 border-t border-gray-200 flex justify-end">
                <button onclick="closeTermsPopup()" class="bg-primary hover:bg-opacity-90 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Saya Setuju
                </button>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/terms-popup.js') }}"></script>
</body>
</html> 