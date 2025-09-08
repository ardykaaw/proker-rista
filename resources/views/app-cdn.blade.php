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
        
        /* Animation classes */
        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Router link active state */
        .router-link-active {
            font-weight: 600;
            color: #0992d6 !important;
        }
        
        /* Hover effects */
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }
        
        .transition-transform {
            transition: transform 0.3s ease;
        }
        
        .transition-colors {
            transition: color 0.3s ease, background-color 0.3s ease;
        }
        
        .duration-300 {
            transition-duration: 300ms;
        }
        
        /* Backdrop blur support */
        .backdrop-blur-md {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        
        /* Router link active state improvements */
        .router-link-active {
            font-weight: 600;
            color: #0992d6 !important;
        }
        
        /* Navbar transparency */
        .bg-transparent {
            background-color: transparent;
        }
        
        .bg-white\/95 {
            background-color: rgba(255, 255, 255, 0.95);
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
                <nav class="fixed w-full top-0 z-50 transition-all duration-300" :class="navbarClass">
                    <div class="container mx-auto px-4">
                        <div class="flex justify-between items-center py-4">
                            <div class="flex items-center">
                                <img src="{{ asset('images/logo/logo-gabung.png') }}" alt="Logo" class="h-12 w-auto">
                                <span class="ml-3 text-xl font-bold" :class="textClass">Desa Rakadua</span>
                            </div>
                            
                            <!-- Mobile menu button -->
                            <button @click="toggleMobileMenu" class="md:hidden" :class="textClass">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            
                            <!-- Desktop menu -->
                            <div class="hidden md:flex space-x-8">
                                <router-link to="/" class="font-medium transition-colors" :class="linkClass">Beranda</router-link>
                                <router-link to="/produk-lokal" class="font-medium transition-colors" :class="linkClass">Produk Lokal</router-link>
                                <router-link to="/sejarah" class="font-medium transition-colors" :class="linkClass">Sejarah</router-link>
                            </div>
                        </div>
                        
                        <!-- Mobile menu -->
                        <div v-show="showMobileMenu" class="md:hidden pb-4">
                            <div class="flex flex-col space-y-2">
                                <router-link to="/" class="font-medium py-2 transition-colors" :class="linkClass">Beranda</router-link>
                                <router-link to="/produk-lokal" class="font-medium py-2 transition-colors" :class="linkClass">Produk Lokal</router-link>
                                <router-link to="/sejarah" class="font-medium py-2 transition-colors" :class="linkClass">Sejarah</router-link>
                            </div>
                        </div>
                    </div>
                </nav>
            `,
            data() {
                return {
                    showMobileMenu: false,
                    isScrolled: false
                }
            },
            computed: {
                navbarClass() {
                    return this.isScrolled 
                        ? 'bg-white/95 backdrop-blur-md shadow-lg' 
                        : 'bg-transparent';
                },
                textClass() {
                    return this.isScrolled 
                        ? 'text-gray-800' 
                        : 'text-white';
                },
                linkClass() {
                    return this.isScrolled 
                        ? 'text-gray-600 hover:text-blue-600' 
                        : 'text-white/90 hover:text-white';
                }
            },
            methods: {
                toggleMobileMenu() {
                    this.showMobileMenu = !this.showMobileMenu;
                },
                handleScroll() {
                    this.isScrolled = window.scrollY > 50;
                }
            },
            mounted() {
                window.addEventListener('scroll', this.handleScroll);
            },
            unmounted() {
                window.removeEventListener('scroll', this.handleScroll);
            }
        };

        // WhatsApp Button Component
        const WhatsAppButton = {
            template: `
                <div class="fixed bottom-6 right-6 z-50">
                    <a href="https://wa.me/6281234567890" target="_blank" 
                       class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                        <i class="fab fa-whatsapp text-2xl"></i>
                    </a>
                </div>
            `
        };

        // Home Component (Full Version)
        const Home = {
            template: `
                <div class="min-h-screen animate-fade-in">
                    <!-- Hero Section -->
                    <div class="relative h-screen">
                        <!-- Full-width background image -->
                        <div class="absolute inset-0">
                            <img :src="carouselImages[currentImage].src" :alt="carouselImages[currentImage].alt" 
                                 class="w-full h-full object-cover" />
                            <!-- Dark overlay -->
                            <div class="absolute inset-0 bg-black/30"></div>
                        </div>

                        <!-- Hero Content -->
                        <div class="absolute z-10 h-full w-full flex flex-col justify-center px-4 sm:px-6 md:px-20">
                            <div class="max-w-7xl mx-auto w-full">
                                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight" 
                                    style="font-family: 'Poppins', sans-serif">
                                    DESA<br class="sm:hidden" />RAKADUA
                                </h1>
                                <p class="text-base sm:text-lg md:text-xl text-white mb-6 sm:mb-8 max-w-lg" 
                                   style="font-family: 'Poppins', sans-serif">
                                    Informasi Seputar UMKM Desa Rakadua
                                </p>
                                <router-link to="/produk-lokal" 
                                           class="inline-block w-full sm:w-auto bg-white bg-opacity-50 text-[#0992d6] px-6 sm:px-8 py-3 rounded-md font-semibold hover:bg-[#0992d6] hover:text-white transition-colors duration-300 text-center text-sm sm:text-base">
                                    CEK SEKARANG
                                </router-link>
                            </div>
                        </div>

                        <!-- Carousel Navigation -->
                        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                            <button v-for="(image, index) in carouselImages" :key="index" 
                                    @click="currentImage = index"
                                    class="w-3 h-3 rounded-full transition-all duration-300"
                                    :class="currentImage === index ? 'bg-white' : 'bg-white/50'">
                            </button>
                        </div>
                    </div>

                    <!-- Tentang Kami Section -->
                    <div class="py-12 sm:py-16 bg-gray-100">
                        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-6 md:gap-8">
                            <div class="w-full md:w-1/2 md:pr-4">
                                <h2 class="text-2xl sm:text-3xl font-bold text-left mb-2" style="font-family: 'Inter', sans-serif; color: #323233;">
                                    Desa Rakadua, Kabupaten Bombana
                                </h2>
                                <span class="block w-16 h-1 bg-[#0992d6] my-1 mb-6"></span>
                                <p class="text-left mb-4 text-sm sm:text-base" style="font-family: 'Noto Sans', sans-serif; color: #929394; line-height: 1.6;">
                                    Desa Rakadua, berada di Kecamatan Poleang Barat, Kabupaten Bombana, adalah wilayah pesisir yang memiliki kekayaan budaya dan potensi ekonomi yang khas. Dikelilingi perairan yang menjadi jalur utama kehidupan masyarakat, Desa Rakadua memiliki sektor kelautan yang berkembang pesat, terutama di bidang perikanan tangkap dan UMKM berbasis hasil laut.
                                </p>
                                <p class="text-left text-sm sm:text-base" style="font-family: 'Noto Sans', sans-serif; color: #929394; line-height: 1.6;">
                                    Masyarakat Rakadua memiliki keterikatan mendalam dengan budaya bahari: pelaku UMKM, khususnya perempuan pesisir, memproduksi aneka olahan laut bernilai tambah, seperti ikan kering, terasi, dan produk kreatif lainnya.
                                </p>
                            </div>
                            <div class="w-full md:w-1/2">
                                <img src="{{ asset('images/tentang-kami/image1.jpg') }}" alt="Desa Rakadua" 
                                     class="w-full h-auto rounded-lg shadow-md" />
                            </div>
                        </div>
                    </div>

                    <!-- Berita dan Event Section -->
                    <div class="py-12 sm:py-16 bg-gray-100">
                        <div class="container mx-auto px-4">
                            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8" style="color: #1a1a1a">
                                Berita dan Event
                            </h2>
                            <div class="flex justify-end items-center mb-8 sm:mb-12">
                                <router-link to="/informasi" class="text-[#0992d6] hover:text-[#0882c0] font-semibold flex items-center text-sm sm:text-base">
                                    Lihat Semua
                                </router-link>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                                <!-- Event Card 1 -->
                                <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105">
                                    <div class="w-full h-48 sm:h-56 lg:h-64 bg-gray-200 flex items-center justify-center">
                                        <img src="{{ asset('images/berita/WhatsApp Image 2025-09-05 at 12.35.33.jpeg') }}" 
                                             alt="Lomba Foto & Reels" class="object-cover w-full h-full" />
                                    </div>
                                    <div class="p-4 sm:p-6">
                                        <h3 class="font-bold text-lg sm:text-xl mb-2">Pawai se Kecamatan Poleang Barat</h3>
                                        <p class="text-sm sm:text-base text-gray-600 mb-4">
                                            Pawai Se Kecamatan Poleang Barat dalam rangka memperingati Hari Kemerdekaan Republik Indonesia ke 80 bersama...
                                        </p>
                                        <button @click="showComingSoonAlert" 
                                                class="w-full sm:w-auto bg-[#0992d6] text-white px-4 py-2 rounded hover:bg-[#0882c0] transition-colors duration-200 text-sm sm:text-base">
                                            Lihat Selengkapnya
                                        </button>
                                    </div>
                                </div>

                                <!-- Event Card 2 -->
                                <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105">
                                    <div class="w-full h-48 sm:h-56 lg:h-64 bg-gray-200 flex items-center justify-center">
                                        <img src="{{ asset('images/berita/WhatsApp Image 2025-09-05 at 12.44.50.jpeg') }}" 
                                             alt="Event Bulan November 2022" class="object-cover w-full h-full" />
                                    </div>
                                    <div class="p-4 sm:p-6">
                                        <h3 class="font-bold text-lg sm:text-xl mb-2">Gerak Jalan Desa Rakadua</h3>
                                        <p class="text-sm sm:text-base text-gray-600 mb-4">
                                            Defile Ibu PKK Desa Rakadua dalam kegiatan Gerak Jalan Se Kecamatan Poleang Barat...
                                        </p>
                                        <button @click="showComingSoonAlert" 
                                                class="w-full sm:w-auto bg-[#0992d6] text-white px-4 py-2 rounded hover:bg-[#0882c0] transition-colors duration-200 text-sm sm:text-base">
                                            Lihat Selengkapnya
                                        </button>
                                    </div>
                                </div>

                                <!-- Event Card 3 -->
                                <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105 sm:col-span-2 lg:col-span-1">
                                    <div class="w-full h-48 sm:h-56 lg:h-64 bg-gray-200 flex items-center justify-center">
                                        <img src="{{ asset('images/berita/foto-log-book-1756512049.jpeg') }}" 
                                             alt="Pagelaran Seni" class="object-cover w-full h-full" />
                                    </div>
                                    <div class="p-4 sm:p-6">
                                        <h3 class="font-bold text-lg sm:text-xl mb-2">Sosialisasi Gemar Menabung</h3>
                                        <p class="text-sm sm:text-base text-gray-600 mb-4">
                                            Sosialisasi GEMBIRA SEJAK DINI(Gemar Menabung Bina Kemandirian Sejak Dini) di SDN 90 Rakadua
                                        </p>
                                        <button @click="showComingSoonAlert" 
                                                class="w-full sm:w-auto bg-[#0992d6] text-white px-4 py-2 rounded hover:bg-[#0882c0] transition-colors duration-200 text-sm sm:text-base">
                                            Lihat Selengkapnya
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Galery Section -->
                    <div class="bg-gray-50 py-12 sm:py-16">
                        <div class="container mx-auto px-4">
                            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8" style="color: #1a1a1a">
                                Foto Desa Kami
                            </h2>
                            <div class="flex justify-end mb-6 sm:mb-8">
                                <router-link to="/paket-tour" class="text-[#0992d6] hover:text-[#0882c0] flex items-center text-sm sm:text-base">
                                    Lihat Semua
                                </router-link>
                            </div>
                            <p class="text-center mb-8 sm:mb-12 text-sm sm:text-base" style="font-family: 'Noto Sans', sans-serif; color: #1a1a1a">
                                Dokumentasi kegiatan dan keindahan Desa Rakadua
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 sm:gap-6">
                                <!-- Large image spanning 8 columns -->
                                <div class="sm:col-span-2 lg:col-span-8 bg-white rounded-lg overflow-hidden shadow-md relative group">
                                    <img src="{{ asset('images/galery/galeri1.jpg') }}" alt="Desa Foto 1" 
                                         class="w-full h-48 sm:h-64 lg:h-[400px] object-cover" />
                                    <div class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                        <p class="text-white/100 p-4 text-sm sm:text-base">Keindahan Pantai Desa Rakadua</p>
                                    </div>
                                </div>

                                <!-- Two smaller images stacked vertically -->
                                <div class="sm:col-span-2 lg:col-span-4 grid grid-rows-2 gap-4 sm:gap-6">
                                    <div class="bg-white rounded-lg overflow-hidden shadow-md relative group">
                                        <img src="{{ asset('images/galery/galeri2.jpg') }}" alt="Desa Foto 2" 
                                             class="w-full h-32 sm:h-40 lg:h-[190px] object-cover" />
                                        <div class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            <p class="text-white/100 p-3 sm:p-4 text-xs sm:text-sm">Aktivitas Nelayan</p>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded-lg overflow-hidden shadow-md relative group">
                                        <img src="{{ asset('images/galery/galeri3.jpg') }}" alt="Desa Foto 3" 
                                             class="w-full h-32 sm:h-40 lg:h-[190px] object-cover" />
                                        <div class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            <p class="text-white/100 p-3 sm:p-4 text-xs sm:text-sm">Kehidupan Masyarakat</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Large image spanning 6 columns -->
                                <div class="sm:col-span-2 lg:col-span-6 bg-white rounded-lg overflow-hidden shadow-md relative group">
                                    <img src="{{ asset('images/galery/galeri4.jpg') }}" alt="Desa Foto 4" 
                                         class="w-full h-48 sm:h-56 lg:h-[300px] object-cover" />
                                    <div class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                        <p class="text-white/100 p-3 sm:p-4 text-sm sm:text-base">Dermaga Nelayan</p>
                                    </div>
                                </div>

                                <!-- Two smaller images side by side -->
                                <div class="sm:col-span-1 lg:col-span-3 bg-white rounded-lg overflow-hidden shadow-md relative group">
                                    <img src="{{ asset('images/galery/galeri5.jpg') }}" alt="Desa Foto 5" 
                                         class="w-full h-48 sm:h-56 lg:h-[300px] object-cover" />
                                    <div class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                        <p class="text-white/100 p-3 sm:p-4 text-xs sm:text-sm">UMKM Lokal</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-1 lg:col-span-3 bg-white rounded-lg overflow-hidden shadow-md relative group">
                                    <img src="{{ asset('images/galery/galeri6.jpg') }}" alt="Desa Foto 6" 
                                         class="w-full h-48 sm:h-56 lg:h-[300px] object-cover" />
                                    <div class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                        <p class="text-white/100 p-3 sm:p-4 text-xs sm:text-sm">Budaya Lokal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <footer class="bg-gradient-to-br from-[#1a1a1a] to-[#2d2d2d] text-white py-12 sm:py-16">
                        <div class="container mx-auto px-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-6 sm:gap-8">
                                <!-- Contact & Social Media -->
                                <div class="sm:col-span-2 lg:col-span-4">
                                    <img src="{{ asset('images/logo/logo-umkm.png') }}" alt="Logo Rakadua" 
                                         class="h-16 sm:h-20 lg:h-24 mb-4 sm:mb-6" />
                                    <p class="text-gray-300 mb-4 sm:mb-6 text-sm sm:text-base">
                                        Jelajahi Keberagaman UMKM Desa Rakadua
                                    </p>
                                    <div class="flex space-x-3 sm:space-x-4">
                                        <a href="#" class="bg-white/10 hover:bg-[#0992d6] p-2 sm:p-3 rounded-full transition-colors">
                                            <i class="fab fa-instagram text-lg sm:text-xl"></i>
                                        </a>
                                        <a href="#" class="bg-white/10 hover:bg-[#0992d6] p-2 sm:p-3 rounded-full transition-colors">
                                            <i class="fab fa-facebook text-lg sm:text-xl"></i>
                                        </a>
                                        <a href="#" class="bg-white/10 hover:bg-[#0992d6] p-2 sm:p-3 rounded-full transition-colors">
                                            <i class="fab fa-youtube text-lg sm:text-xl"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Quick Links -->
                                <div class="sm:col-span-1 lg:col-span-2">
                                    <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Menu</h4>
                                    <ul class="space-y-2">
                                        <li><router-link to="/" class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base">Home</router-link></li>
                                        <li><router-link to="/sejarah" class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base">Sejarah</router-link></li>
                                        <li><router-link to="/produk-lokal" class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base">Produk Lokal</router-link></li>
                                    </ul>
                                </div>

                                <!-- Wisata -->
                                <div class="sm:col-span-1 lg:col-span-3">
                                    <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Wisata</h4>
                                    <ul class="space-y-2">
                                        <li class="text-gray-300 text-sm sm:text-base">Pantai Rakadua</li>
                                        <li class="text-gray-300 text-sm sm:text-base">Dermaga Nelayan</li>
                                        <li class="text-gray-300 text-sm sm:text-base">UMKM Lokal</li>
                                        <li class="text-gray-300 text-sm sm:text-base">Budaya Bahari</li>
                                    </ul>
                                </div>

                                <!-- Contact Info -->
                                <div class="sm:col-span-2 lg:col-span-3">
                                    <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Hubungi Kami</h4>
                                    <div class="space-y-3 sm:space-y-4">
                                        <div class="flex items-start space-x-3">
                                            <i class="fas fa-map-marker-alt mt-1 text-[#0992d6] text-sm sm:text-base"></i>
                                            <p class="text-gray-300 text-sm sm:text-base">Desa Rakadua, Kec. Poleang Barat, Kab. Bombana, Sulawesi Tenggara</p>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-phone text-[#0992d6] text-sm sm:text-base"></i>
                                            <p class="text-gray-300 text-sm sm:text-base">+62 00-0000-0000</p>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-envelope text-[#0992d6] text-sm sm:text-base"></i>
                                            <p class="text-gray-300 text-sm sm:text-base">rakadua@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Copyright -->
                            <div class="border-t border-white/10 mt-8 sm:mt-12 pt-6 sm:pt-8 text-center text-gray-400">
                                <p class="text-sm sm:text-base">&copy; 2024 Desa Rakadua. All rights reserved.</p>
                            </div>
                        </div>
                    </footer>
                </div>
            `,
            data() {
                return {
                    currentImage: 0,
                    carouselImages: [
                        { id: 1, src: "{{ asset('images/herosection/bg-hero2.jpg') }}", alt: "Hero Image 1" },
                        { id: 2, src: "{{ asset('images/herosection/bg-hero6.jpeg') }}", alt: "Hero Image 2" },
                        { id: 3, src: "{{ asset('images/herosection/bg-hero3.jpg') }}", alt: "Hero Image 3" },
                        { id: 4, src: "{{ asset('images/herosection/bg-hero7.jpeg') }}", alt: "Hero Image 4" },
                        { id: 5, src: "{{ asset('images/herosection/bg-hero5.jpeg') }}", alt: "Hero Image 5" }
                    ]
                }
            },
            methods: {
                nextImage() {
                    this.currentImage = (this.currentImage + 1) % this.carouselImages.length;
                },
                prevImage() {
                    this.currentImage = this.currentImage === 0 ? this.carouselImages.length - 1 : this.currentImage - 1;
                },
                startCarousel() {
                    setInterval(this.nextImage, 5000);
                },
                showComingSoonAlert() {
                    alert('Fitur ini akan tersedia segera');
                }
            },
            mounted() {
                this.startCarousel();
            }
        };
        
        // Produk Lokal Component
        const ProdukLokal = {
            template: `
                <div class="min-h-screen pt-20">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-20">
                        <div class="container mx-auto px-4 text-center">
                            <h1 class="text-4xl md:text-6xl font-bold mb-4">PRODUK LOKAL</h1>
                            <p class="text-xl mb-8">Berbagai produk unggulan dari UMKM Desa Rakadua</p>
                        </div>
                    </div>
                    
                    <div class="py-16 bg-gray-100">
                        <div class="container mx-auto px-4">
                            <h2 class="text-3xl font-bold text-center mb-8">Produk Unggulan Desa Rakadua</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-xl font-bold mb-4">Ikan Kering</h3>
                                    <p class="text-gray-600">Produk olahan ikan segar dengan kualitas terbaik</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-xl font-bold mb-4">Terasi</h3>
                                    <p class="text-gray-600">Terasi khas pesisir dengan cita rasa autentik</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-6">
                                    <h3 class="text-xl font-bold mb-4">Kerajinan Tangan</h3>
                                    <p class="text-gray-600">Berbagai kerajinan tangan dari bahan lokal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        };

        // Sejarah Component
        const Sejarah = {
            template: `
                <div class="min-h-screen pt-20">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-20">
                        <div class="container mx-auto px-4 text-center">
                            <h1 class="text-4xl md:text-6xl font-bold mb-4">SEJARAH</h1>
                            <p class="text-xl mb-8">Sejarah dan Perjalanan Desa Rakadua</p>
                        </div>
                    </div>
                    
                    <div class="py-16 bg-gray-100">
                        <div class="container mx-auto px-4">
                            <h2 class="text-3xl font-bold text-center mb-8">Sejarah Desa Rakadua</h2>
                            <div class="max-w-4xl mx-auto">
                                <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                                    Desa Rakadua memiliki sejarah panjang sebagai wilayah pesisir yang kaya akan budaya bahari. 
                                    Sejak dahulu, masyarakat Rakadua telah mengandalkan laut sebagai sumber kehidupan utama.
                                </p>
                                <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                                    Perkembangan UMKM di Desa Rakadua dimulai dari tradisi turun-temurun dalam mengolah hasil laut, 
                                    yang kemudian berkembang menjadi industri kreatif yang mendukung perekonomian masyarakat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            `
        };

        // Router configuration
        const routes = [
            { path: '/', component: Home },
            { path: '/produk-lokal', component: ProdukLokal },
            { path: '/sejarah', component: Sejarah }
        ];
        
        const router = createRouter({
            history: createWebHistory('/public/'),
            routes
        });
        
        // Create and mount app
        const app = createApp({
            components: {
                Navbar,
                WhatsAppButton
            },
            template: `
                <div>
                    <Navbar />
                    <router-view />
                    <WhatsAppButton />
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
