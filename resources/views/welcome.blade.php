<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Rakadua</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Selamat Datang di Desa Rakadua</h1>
            <p class="text-lg text-gray-600 mb-8">Desa Wisata dan Produk Lokal Kabupaten Bombana</p>
            <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Masuk ke Website
            </a>
        </div>
    </div>
</body>
</html>