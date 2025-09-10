<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Desa Rakadua, Kabupaten Bombana - Informasi seputar UMKM, produk lokal, dan wisata bahari di Desa Rakadua">
    <meta name="keywords" content="Desa Rakadua, Bombana, UMKM, produk lokal, wisata bahari, Sulawesi Tenggara">
    <meta name="author" content="Desa Rakadua">
    
    <title>Desa Rakadua - Kabupaten Bombana</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Basic CSS for fallback -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            text-align: center;
            color: white;
            max-width: 600px;
            padding: 2rem;
        }
        .logo {
            height: 120px;
            margin-bottom: 2rem;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            margin: 0 10px;
        }
        .btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        .loading {
            margin-top: 2rem;
        }
        .spinner {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="images/logo/rakadua_logo.png" alt="Desa Rakadua" class="logo">
        <h1>Desa Rakadua</h1>
        <p>Kabupaten Bombana, Sulawesi Tenggara</p>
        <p>Jelajahi keberagaman UMKM dan produk lokal Desa Rakadua</p>
        
        <div class="loading">
            <div class="spinner"></div>
            <p>Memuat aplikasi...</p>
        </div>
        
        <div style="margin-top: 2rem;">
            <a href="/produk-lokal" class="btn">Produk Lokal</a>
            <a href="/sejarah" class="btn">Sejarah Desa</a>
        </div>
    </div>
    
    <script>
        // Redirect to main app after a short delay
        setTimeout(function() {
            window.location.href = '/';
        }, 2000);
    </script>
</body>
</html>
