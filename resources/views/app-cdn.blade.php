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
    
    <title>Desa Rakadua - Kabupaten Bombana</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    
    <!-- Vue.js from CDN (Production Build) -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
    <script src="https://unpkg.com/vue-router@4/dist/vue-router.global.prod.js"></script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom CSS -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        @media (max-width: 640px) {
            button, a, input, select, textarea {
                min-height: 44px;
            }
            
            body {
                overflow-x: hidden;
            }
        }
    </style>
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
        // Simple Vue app with CDN
        const { createApp } = Vue;
        const { createRouter, createWebHistory } = VueRouter;
        
        // Navbar Component
        const Navbar = {
            template: `
                <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
                    <div class="container mx-auto px-4">
                        <div class="flex justify-between items-center py-4">
                            <div class="flex items-center">
                                <img src="{{ asset('images/logo/logo-gabung.png') }}" alt="Logo" class="h-12 w-auto">
                                <span class="ml-3 text-xl font-bold text-gray-800">Desa Rakadua</span>
                            </div>
                            
                            <!-- Mobile menu button -->
                            <button @click="toggleMobileMenu" class="md:hidden text-gray-600 hover:text-gray-900">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            
                            <!-- Desktop menu -->
                            <div class="hidden md:flex space-x-8">
                                <router-link to="/" class="text-gray-600 hover:text-blue-600 font-medium">Beranda</router-link>
                                <router-link to="/produk-lokal" class="text-gray-600 hover:text-blue-600 font-medium">Produk Lokal</router-link>
                                <router-link to="/sejarah" class="text-gray-600 hover:text-blue-600 font-medium">Sejarah</router-link>
                            </div>
                        </div>
                        
                        <!-- Mobile menu -->
                        <div v-show="showMobileMenu" class="md:hidden pb-4">
                            <div class="flex flex-col space-y-2">
                                <router-link to="/" class="text-gray-600 hover:text-blue-600 font-medium py-2">Beranda</router-link>
                                <router-link to="/produk-lokal" class="text-gray-600 hover:text-blue-600 font-medium py-2">Produk Lokal</router-link>
                                <router-link to="/sejarah" class="text-gray-600 hover:text-blue-600 font-medium py-2">Sejarah</router-link>
                            </div>
                        </div>
                    </div>
                </nav>
            `,
            data() {
                return {
                    showMobileMenu: false
                }
            },
            methods: {
                toggleMobileMenu() {
                    this.showMobileMenu = !this.showMobileMenu;
                }
            }
        };

        // Home Component
        const Home = {
            template: `
                <div class="min-h-screen pt-20">
                    <!-- Hero Section -->
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-20">
                        <div class="container mx-auto px-4 text-center">
                            <h1 class="text-4xl md:text-6xl font-bold mb-4">DESA RAKADUA</h1>
                            <p class="text-xl mb-8">Informasi Seputar UMKM Desa Rakadua</p>
                            <router-link to="/produk-lokal" class="bg-white text-blue-600 px-8 py-3 rounded-md font-semibold hover:bg-gray-100 transition-colors inline-block">
                                CEK SEKARANG
                            </router-link>
                        </div>
                    </div>
                    
                    <!-- About Section -->
                    <div class="py-16 bg-gray-100">
                        <div class="container mx-auto px-4">
                            <h2 class="text-3xl font-bold text-center mb-8">Desa Rakadua, Kabupaten Bombana</h2>
                            <p class="text-center max-w-3xl mx-auto text-gray-600">
                                Desa Rakadua, berada di Kecamatan Poleang Barat, Kabupaten Bombana, adalah wilayah pesisir yang memiliki kekayaan budaya dan potensi ekonomi yang khas.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Features Section -->
                    <div class="py-16 bg-gray-50">
                        <div class="container mx-auto px-4">
                            <h2 class="text-3xl font-bold text-center mb-8">Produk Lokal</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-xl font-bold mb-4">UMKM Lokal</h3>
                                    <p class="text-gray-600">Berbagai produk unggulan dari pengrajin lokal</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-xl font-bold mb-4">Wisata Bahari</h3>
                                    <p class="text-gray-600">Keindahan alam pesisir yang memukau</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-xl font-bold mb-4">Budaya Lokal</h3>
                                    <p class="text-gray-600">Kekayaan budaya dan tradisi masyarakat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        };
        
        // Simple router
        const routes = [
            { path: '/', component: Home },
            { path: '/produk-lokal', component: Home },
            { path: '/sejarah', component: Home }
        ];
        
        const router = createRouter({
            history: createWebHistory('/public/'),
            routes
        });
        
        // Create and mount app
        const app = createApp({
            components: {
                Navbar
            },
            template: `
                <div>
                    <Navbar />
                    <router-view />
                </div>
            `,
            mounted() {
                console.log('Vue app loaded from CDN');
                const loading = document.getElementById('loading');
                if (loading) {
                    loading.style.display = 'none';
                }
            }
        });
        
        app.use(router);
        app.mount('#app');
    </script>
</body>
</html>
