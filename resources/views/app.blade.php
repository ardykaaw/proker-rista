<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Desa Rakadua, Kabupaten Bombana - Informasi seputar UMKM, produk lokal, dan wisata bahari di Desa Rakadua">
    <meta name="keywords" content="Desa Rakadua, Bombana, UMKM, produk lokal, wisata bahari, Sulawesi Tenggara">
    <meta name="author" content="Desa Rakadua">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Desa Rakadua - Kabupaten Bombana">
    <meta property="og:description" content="Jelajahi keberagaman UMKM dan produk lokal Desa Rakadua">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('images/logo/logo-gabung.png') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Desa Rakadua - Kabupaten Bombana">
    <meta name="twitter:description" content="Jelajahi keberagaman UMKM dan produk lokal Desa Rakadua">
    <meta name="twitter:image" content="{{ asset('images/logo/logo-gabung.png') }}">
    
    <title>Desa Rakadua - Kabupaten Bombana</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Preload critical resources -->
    <link rel="preload" href="{{ asset('images/logo/logo-gabung.png') }}" as="image">
</head>
<body>
    <div id="app">
        <!-- Loading fallback -->
        <div id="loading" style="display: flex; justify-content: center; align-items: center; height: 100vh; background: #f8f9fa;">
            <div style="text-align: center;">
                <img src="{{ asset('images/logo/logo-gabung.png') }}" alt="Desa Rakadua" style="height: 80px; margin-bottom: 20px;">
                <p style="color: #666; font-family: 'Poppins', sans-serif;">Memuat...</p>
            </div>
        </div>
    </div>
    
    <script>
        // Debug script untuk melihat error
        window.addEventListener('error', function(e) {
            console.error('JavaScript Error:', e.error);
            const loading = document.getElementById('loading');
            if (loading) {
                loading.innerHTML = `
                    <div style="text-align: center; color: #e53e3e;">
                        <h3>Error Loading Application</h3>
                        <p>Error: ${e.message}</p>
                        <p>File: ${e.filename}:${e.lineno}</p>
                        <button onclick="location.reload()" style="margin-top: 20px; padding: 10px 20px; background: #3182ce; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            Reload Page
                        </button>
                    </div>
                `;
            }
        });

        // Hide loading screen when Vue app is mounted
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded');
            
            // Check if Vue app is loaded
            const checkVueApp = setInterval(function() {
                const app = document.getElementById('app');
                console.log('Checking Vue app...', app);
                
                if (app && app.children.length > 1) {
                    console.log('Vue app loaded successfully');
                    const loading = document.getElementById('loading');
                    if (loading) {
                        loading.style.display = 'none';
                    }
                    clearInterval(checkVueApp);
                }
            }, 100);
            
            // Fallback timeout with error message
            setTimeout(function() {
                const loading = document.getElementById('loading');
                const app = document.getElementById('app');
                
                if (loading && (!app || app.children.length <= 1)) {
                    console.error('Vue app failed to load');
                    loading.innerHTML = `
                        <div style="text-align: center; color: #e53e3e;">
                            <h3>Application Failed to Load</h3>
                            <p>Vue.js application tidak berhasil dimuat.</p>
                            <p>Silakan cek console browser untuk detail error.</p>
                            <button onclick="location.reload()" style="margin-top: 20px; padding: 10px 20px; background: #3182ce; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                Reload Page
                            </button>
                        </div>
                    `;
                }
                clearInterval(checkVueApp);
            }, 5000);
        });
    </script>
</body>
</html> 