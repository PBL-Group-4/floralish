<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Floralish</title>
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
        .login-card {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
        }
        #registerButton {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="login-card w-full max-w-md p-8">
        <div class="text-center mb-8">
            <h1 class="logo-text text-primary">Floralish.</h1>
            <p class="text-gray-600 mt-2">Admin Dashboard</p>
        </div>
        
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        
        <form method="POST" action="{{ route('admin.login.authenticate') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Masuk
                </button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-primary">
                Kembali ke halaman utama
            </a>
        </div>
    </div>

    <!-- Tombol Register Admin yang akan muncul -->
    <a href="{{ route('admin.register') }}" id="registerButton" class="bg-primary text-white px-4 py-2 rounded-md shadow-md hover:bg-opacity-90">
        Register Admin
    </a>

    <script>
        document.addEventListener('keydown', function(e) {
            // CTRL + SHIFT + X
            if (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === 'x') {
                e.preventDefault();
                const registerButton = document.getElementById('registerButton');
                
                // Toggle tampilan tombol
                if (registerButton.style.display === 'block') {
                    registerButton.style.display = 'none';
                } else {
                    registerButton.style.display = 'block';
                }
            }
        });
    </script>
</body>
</html> 