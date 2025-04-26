<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="{{ asset('style/flowbite.min.css') }}" rel="stylesheet">
</head>
<body class="p-4">
    <header class="mb-6">
        <h1 class="text-3xl font-bold">@yield('page_title')</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <script src="{{ asset('style/flowbite.min.js') }}"></script>
</body>
</html>
