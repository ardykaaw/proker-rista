<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        
        // Navbar Component (Matching original styling)
        const Navbar = {
            template: `
                <nav class="absolute top-0 left-0 right-0 z-50 py-2 md:py-4 bg-transparent">
                    <div class="container mx-auto px-4">
                        <div class="flex justify-between items-center">
                            <!-- Logo -->
                            <div class="flex items-center">
                                <img src="{{ asset('images/logo/logo-gabung.png') }}" alt="Logo" class="h-16 md:h-20 lg:h-24 mr-2">
                            </div>

                            <!-- Mobile Menu Button -->
                            <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="lg:hidden text-white focus:outline-none p-2 rounded-md hover:bg-white/10 transition-colors" :class="{ 'bg-white/10': isMobileMenuOpen }">
                                <svg class="w-6 h-6 transition-transform duration-300" :class="{ 'rotate-90': isMobileMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path v-if="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <!-- Desktop Menu -->
                            <div class="hidden lg:flex items-center space-x-6">
                                <router-link to="/" class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]">Home</router-link>
                                <router-link to="/sejarah" class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]">Sejarah Desa</router-link>
                                <router-link to="/produk-lokal" class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]">Produk Lokal</router-link>
                                <a href="/#gallery" class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]">Gallery</a>
                                <a href="/login" class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]">Admin</a>
                            </div>
                        </div>

                        <!-- Mobile Menu Overlay -->
                        <div v-show="isMobileMenuOpen" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40" @click="isMobileMenuOpen = false">
                            <div class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-xl z-50" @click.stop>
                                <div class="flex flex-col h-full">
                                    <!-- Header -->
                                    <div class="flex items-center justify-between p-6 border-b border-gray-200">
                                        <img src="{{ asset('images/logo/logo-gabung.png') }}" alt="Logo" class="h-12">
                                        <button @click="isMobileMenuOpen = false" class="text-gray-500 hover:text-gray-700 p-2 rounded-md hover:bg-gray-100 transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Mobile Menu Items -->
                                    <nav class="flex-1 px-6 py-6">
                                        <div class="space-y-2">
                                            <router-link to="/" class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium" @click="isMobileMenuOpen = false">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                </svg>
                                                Home
                                            </router-link>
                                            <router-link to="/sejarah" class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium" @click="isMobileMenuOpen = false">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                                Sejarah Desa
                                            </router-link>
                                            <router-link to="/produk-lokal" class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium" @click="isMobileMenuOpen = false">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                </svg>
                                                Produk Lokal
                                            </router-link>
                                            <a href="#gallery" class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium" @click="isMobileMenuOpen = false">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Gallery
                                            </a>
                                            <a href="/login" class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium" @click="isMobileMenuOpen = false">
                                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Admin
                                            </a>
                                        </div>
                                    </nav>

                                    <!-- Footer -->
                                    <div class="p-6 border-t border-gray-200">
                                        <p class="text-sm text-gray-500 text-center">Desa Rakadua, Kabupaten Bombana</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            `,
            data() {
                return {
                    isMobileMenuOpen: false
                }
            },
            mounted() {
                // Close mobile menu on route change
                this.$router.afterEach(() => {
                    this.isMobileMenuOpen = false;
                });
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
        
        // Produk Lokal Component (Full Version)
        const ProdukLokal = {
            template: `
                <div class="min-h-screen">
                    <!-- Hero Section -->
                    <div class="relative h-screen">
                        <div class="absolute inset-0">
                            <img :src="carouselImages[currentImage].src" :alt="carouselImages[currentImage].alt" 
                                 class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-black/30"></div>
                        </div>

                        <div class="absolute z-10 h-full flex flex-col justify-center items-start px-4 sm:px-6 md:px-20 max-w-7xl mx-auto">
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4" 
                                style="font-family: 'Poppins', sans-serif">
                                Produk Lokal
                            </h1>
                            <p class="text-base sm:text-lg md:text-xl text-white mb-6 sm:mb-8 max-w-2xl" 
                               style="font-family: 'Poppins', sans-serif">
                                Temukan keunikan produk lokal Desa Rakadua
                            </p>
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

                    <!-- Content Section -->
                    <div class="py-12 sm:py-16 bg-gray-50">
                        <div class="container mx-auto px-4">
                            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-4">Produk Lokal Unggulan</h2>
                            <p class="text-gray-600 text-center mb-8 sm:mb-12 max-w-2xl mx-auto text-sm sm:text-base">
                                Nikmati berbagai produk lokal berkualitas dari Desa Rakadua. Setiap pembelian membantu mendukung pengrajin lokal kami.
                            </p>

                            <!-- Filter and Sort Section -->
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 sm:mb-8 gap-4">
                                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 w-full sm:w-auto">
                                    <select class="px-3 sm:px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm sm:text-base w-full sm:w-auto">
                                        <option value="">Semua Kategori</option>
                                        <option value="makanan">Makanan</option>
                                        <option value="kerajinan">Kerajinan</option>
                                        <option value="fashion">Fashion</option>
                                    </select>
                                </div>
                                <div class="w-full sm:w-auto">
                                    <select class="px-3 sm:px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm sm:text-base w-full sm:w-auto">
                                        <option value="terbaru">Terbaru</option>
                                        <option value="termurah">Harga: Rendah ke Tinggi</option>
                                        <option value="termahal">Harga: Tinggi ke Rendah</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Products Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
                                <!-- Product Card -->
                                <div v-for="product in products" :key="product.id" 
                                     class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    <div class="relative">
                                        <img v-if="product.image" :src="product.image" :alt="product.name" 
                                             class="w-full h-48 sm:h-56 lg:h-64 object-cover" />
                                        <div v-else class="w-full h-48 sm:h-56 lg:h-64 bg-gray-200 flex items-center justify-center">
                                            <div class="text-center p-4">
                                                <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="text-gray-500 text-xs sm:text-sm">@{{ product.name }}</p>
                                                <p class="text-gray-400 text-xs">Gambar produk akan ditambahkan</p>
                                            </div>
                                        </div>
                                        <div v-if="product.badge" class="absolute top-2 sm:top-4 right-2 sm:right-4 bg-red-500 text-white px-2 sm:px-3 py-1 rounded-full text-xs sm:text-sm">
                                            @{{ product.badge }}
                                        </div>
                                    </div>
                                    <div class="p-4 sm:p-6">
                                        <div class="text-xs sm:text-sm text-blue-600 font-medium mb-2">@{{ product.category }}</div>
                                        <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">@{{ product.name }}</h3>
                                        <p class="text-gray-600 text-xs sm:text-sm mb-3 sm:mb-4 line-clamp-2">@{{ product.description }}</p>
                                        <div class="flex justify-between items-center mb-3 sm:mb-4">
                                            <span class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">Rp @{{ product.price.toLocaleString() }}</span>
                                            <span class="text-xs sm:text-sm text-gray-500">Stok: @{{ product.stock }}</span>
                                        </div>
                                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3">
                                            <button @click="addToCart(product)" 
                                                    class="flex-1 bg-gray-100 text-gray-800 py-2 px-3 sm:px-4 rounded-lg hover:bg-gray-200 transition-colors duration-200 text-xs sm:text-sm">
                                                + Keranjang
                                            </button>
                                            <button @click="openWhatsApp(product)" 
                                                    class="flex-1 bg-blue-600 text-white py-2 px-3 sm:px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-xs sm:text-sm">
                                                Beli Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shopping Cart Popup -->
                            <div v-if="showCart" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                                <div class="bg-white rounded-lg p-4 sm:p-6 max-w-md w-full mx-4 max-h-[90vh] overflow-hidden flex flex-col">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-base sm:text-lg font-semibold">Keranjang Belanja</h3>
                                        <button @click="showCart = false" class="text-gray-500 hover:text-gray-700 p-1">
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="flex-1 overflow-y-auto">
                                        <div v-for="item in cart" :key="item.id" class="flex items-center py-3 sm:py-4 border-b">
                                            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gray-200 rounded flex items-center justify-center flex-shrink-0">
                                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div class="ml-3 sm:ml-4 flex-1 min-w-0">
                                                <h4 class="text-xs sm:text-sm font-medium truncate">@{{ item.name }}</h4>
                                                <p class="text-xs sm:text-sm text-gray-500">Rp @{{ item.price.toLocaleString() }}</p>
                                            </div>
                                            <div class="flex items-center ml-2">
                                                <button @click="decreaseQuantity(item)" 
                                                        class="text-gray-500 hover:text-gray-700 w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center rounded-full hover:bg-gray-100">-</button>
                                                <span class="mx-2 w-6 sm:w-8 text-center text-xs sm:text-sm">@{{ item.quantity }}</span>
                                                <button @click="increaseQuantity(item)" 
                                                        class="text-gray-500 hover:text-gray-700 w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center rounded-full hover:bg-gray-100">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 border-t pt-4">
                                        <div class="flex justify-between mb-3 sm:mb-4">
                                            <span class="font-medium text-sm sm:text-base">Total:</span>
                                            <span class="font-bold text-sm sm:text-base">Rp @{{ cartTotal.toLocaleString() }}</span>
                                        </div>
                                        <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm sm:text-base">
                                            Checkout
                                        </button>
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
                                    <img src="{{ asset('images/logo/logo-umkm.png') }}" alt="Logo Bungkutoko" class="h-16 sm:h-20 lg:h-24 mb-4 sm:mb-6" />
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
                                            <p class="text-gray-300 text-sm sm:text-base">
                                                Desa Rakadua, Kec. Poleang Barat, Kab. Bombana, Sulawesi Tenggara
                                            </p>
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
                                <p class="text-sm sm:text-base">
                                    &copy; 2024 Desa Rakadua. All rights reserved.
                                </p>
                            </div>
                        </div>
                    </footer>
                </div>
            `,
            data() {
                return {
                    currentImage: 0,
                    showCart: false,
                    cart: [],
                    products: [],
                    carouselIntervalId: null,
                    carouselImages: [
                        { id: 1, src: "{{ asset('images/herosection/bg-hero2.jpg') }}", alt: "Hero Image 1" },
                        { id: 2, src: "{{ asset('images/herosection/bg-hero6.jpeg') }}", alt: "Hero Image 2" },
                        { id: 3, src: "{{ asset('images/herosection/bg-hero3.jpg') }}", alt: "Hero Image 3" },
                        { id: 4, src: "{{ asset('images/herosection/bg-hero7.jpeg') }}", alt: "Hero Image 4" },
                        { id: 5, src: "{{ asset('images/herosection/bg-hero5.jpeg') }}", alt: "Hero Image 5" }
                    ]
                }
            },
            computed: {
                cartTotal() {
                    return this.cart.reduce((total, item) => total + item.price * item.quantity, 0);
                }
            },
            methods: {
                nextImage() {
                    this.currentImage = (this.currentImage + 1) % this.carouselImages.length;
                },
                startCarousel() {
                    if (this.carouselIntervalId) clearInterval(this.carouselIntervalId);
                    this.carouselIntervalId = setInterval(this.nextImage, 5000);
                },
                addToCart(product) {
                    const existingItem = this.cart.find((item) => item.id === product.id);
                    if (existingItem) {
                        existingItem.quantity++;
                    } else {
                        this.cart.push({ ...product, quantity: 1 });
                    }
                    this.showCart = true;
                },
                openWhatsApp(product) {
                    const phone = (product.phone || '').replace(/[^0-9]/g, '');
                    const text = encodeURIComponent(`Halo, saya ingin membeli produk ${product.name} (Rp ${product.price.toLocaleString()}). Apakah tersedia?`);
                    const url = phone ? `https://wa.me/${phone}?text=${text}` : `https://wa.me/?text=${text}`;
                    window.open(url, '_blank');
                },
                increaseQuantity(item) {
                    if (item.quantity < item.stock) {
                        item.quantity++;
                    }
                },
                decreaseQuantity(item) {
                    if (item.quantity > 1) {
                        item.quantity--;
                    } else {
                        this.cart = this.cart.filter((cartItem) => cartItem.id !== item.id);
                    }
                },
                async fetchProducts() {
                    try {
                        console.log('Fetching products from API...');
                        const response = await fetch('/api/products');
                        console.log('API Response status:', response.status);
                        
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        
                        const data = await response.json();
                        console.log('Products data received:', data);
                        
                        this.products = data.map(p => ({
                            id: p.id,
                            name: p.name,
                            description: p.description || '',
                            price: p.price || 0,
                            image: p.image_path || '',
                            category: p.category || '',
                            stock: p.stock || 0,
                            phone: p.phone || '',
                            badge: null
                        }));
                        
                        console.log('Products processed:', this.products);
                    } catch (e) {
                        console.error('Gagal mengambil produk:', e);
                        // Kosongkan products jika API gagal
                        this.products = [];
                    }
                }
            },
            mounted() {
                this.startCarousel();
                this.fetchProducts();
            },
            beforeUnmount() {
                if (this.carouselIntervalId) clearInterval(this.carouselIntervalId);
            }
        };

        // Sejarah Component (Full Version)
        const Sejarah = {
            template: `
                <div>
                    <!-- Hero Section -->
                    <div class="relative h-screen">
                        <div class="absolute inset-0">
                            <img :src="carouselImages[currentImage].src" :alt="carouselImages[currentImage].alt" 
                                 class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-black/30"></div>
                        </div>

                        <div class="relative z-10 h-full flex flex-col justify-start items-center px-4 sm:px-6 md:px-20 max-w-7xl mx-auto pt-20 sm:pt-32 md:pt-42">
                            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 text-center" 
                                style="font-family: 'Poppins', sans-serif;">
                                Sejarah Desa Rakadua
                            </h1>
                            <div class="max-w-4xl mx-auto">
                                <p class="text-xs sm:text-sm text-white mb-4 sm:mb-6 text-center leading-relaxed" 
                                   style="font-family: 'Poppins', sans-serif;">
                                    Sejarah singkat Rakadua tidak terlepas dari asal-usul namanya. Nama Rakadua diyakini berasal dari bahasa lokal setempat, yang berarti "dua rakit" atau "dua jalur" — merujuk pada letak desa yang berada di antara dua alur perairan yang menjadi jalur transportasi dan perdagangan masyarakat. Pada masa lampau, wilayah ini dikenal sebagai titik singgah nelayan dan pedagang yang melintas di pesisir barat Poleang.
                                </p>
                                <p class="text-xs sm:text-sm text-white mb-4 sm:mb-6 text-center leading-relaxed" 
                                   style="font-family: 'Poppins', sans-serif;">
                                    Awal mula pemukiman di Rakadua diyakini berasal dari kelompok masyarakat pesisir yang terdiri dari suku-suku lokal Poleang, yang kemudian berinteraksi dengan pendatang dari Bugis, Buton, dan Bajo. Pendatang ini umumnya datang untuk berdagang atau mencari penghidupan di sektor kelautan. Hubungan pernikahan dan perdagangan membuat komunitas Rakadua semakin beragam, namun tetap memegang budaya maritim yang kuat.
                                </p>
                                <p class="text-xs sm:text-sm text-white mb-4 sm:mb-6 text-center leading-relaxed" 
                                   style="font-family: 'Poppins', sans-serif;">
                                    Pada masa kolonial Belanda, Rakadua menjadi salah satu titik penting di jalur perairan Teluk Bone yang menghubungkan beberapa desa pesisir di Poleang Barat. Meskipun tidak menjadi pusat militer atau perdagangan besar, keberadaan dermaga kecil dan jalur laut menjadikan Rakadua dikenal sebagai desa nelayan yang ramai.
                                </p>
                                <p class="text-xs sm:text-sm text-white mb-6 sm:mb-8 text-center leading-relaxed" 
                                   style="font-family: 'Poppins', sans-serif;">
                                    Hingga kini, Desa Rakadua tetap mempertahankan identitasnya sebagai desa pesisir. Sebagian besar penduduk masih bergantung pada sektor perikanan, baik tangkap maupun budidaya, sementara kelompok UMKM — terutama yang dikelola oleh perempuan — mengolah hasil laut menjadi produk bernilai jual. Budaya gotong royong, upacara adat, dan tradisi bahari tetap hidup, menjadikan Rakadua bukan hanya pusat aktivitas ekonomi pesisir, tetapi juga simpul budaya di Poleang Barat.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <footer class="bg-gradient-to-br from-[#1a1a1a] to-[#2d2d2d] text-white py-12 sm:py-16">
                        <div class="container mx-auto px-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-6 sm:gap-8">
                                <!-- Contact & Social Media -->
                                <div class="sm:col-span-2 lg:col-span-4">
                                    <img src="{{ asset('images/logo/logo-umkm.png') }}" alt="Logo Bungkutoko" class="h-16 sm:h-20 lg:h-24 mb-4 sm:mb-6" />
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
                                            <p class="text-gray-300 text-sm sm:text-base">
                                                Desa Rakadua, Kec. Poleang Barat, Kab. Bombana, Sulawesi Tenggara
                                            </p>
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
                                <p class="text-sm sm:text-base">
                                    &copy; 2024 Desa Rakadua. All rights reserved.
                                </p>
                            </div>
                        </div>
                    </footer>
                </div>
            `,
            data() {
                return {
                    currentImage: 0,
                    carouselImages: [
                        { id: 1, src: "{{ asset('images/herosection/bg-hero.jpg') }}", alt: 'Hero Image 1' },
                        { id: 2, src: "{{ asset('images/herosection/bg-hero2.jpg') }}", alt: 'Hero Image 2' },
                        { id: 3, src: "{{ asset('images/herosection/bg-hero3.jpg') }}", alt: 'Hero Image 3' },
                        { id: 4, src: "{{ asset('images/herosection/bg-hero4.jpeg') }}", alt: 'Hero Image 4' },
                        { id: 5, src: "{{ asset('images/herosection/bg-hero5.jpeg') }}", alt: 'Hero Image 5' }
                    ]
                }
            },
            methods: {
                nextImage() {
                    this.currentImage = (this.currentImage + 1) % this.carouselImages.length;
                },
                startCarousel() {
                    setInterval(this.nextImage, 5000);
                }
            },
            mounted() {
                this.startCarousel();
            }
        };

        // Login Component
        const Login = {
            template: `
                <div class="min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat relative" 
                     style="background-image: url('{{ asset('images/background/background_login.jpg') }}')">
                    <div class="absolute inset-0 bg-opacity-80"></div>
                    <div class="max-w-md w-full space-y-6 p-10 bg-white/95 backdrop-blur-sm rounded-xl shadow-lg relative z-10">
                        <div>
                            <h2 class="text-center text-3xl font-extrabold text-gray-800">Admin Login</h2>
                            <p class="mt-2 text-center text-sm text-gray-600">Sign in to access dashboard</p>
                        </div>
                        <form class="mt-8 space-y-6" @submit.prevent="handleLogin">
                            <div class="space-y-5">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                    <input id="email" type="email" v-model="email" required 
                                           class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out" 
                                           placeholder="Enter your email" />
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                    <input id="password" type="password" v-model="password" required 
                                           class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out" 
                                           placeholder="Enter your password" />
                                </div>
                            </div>
                            <div class="space-y-4">
                                <button type="submit" 
                                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                    Sign in
                                </button>
                                <div v-if="error" class="text-red-600 text-sm text-center">@{{ error }}</div>
                            </div>
                        </form>
                    </div>
                </div>
            `,
            data() {
                return {
                    email: "",
                    password: "",
                    error: ""
                }
            },
            methods: {
                async handleLogin() {
                    try {
                        this.error = "";
                        const response = await fetch('/api/login', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                email: this.email,
                                password: this.password
                            })
                        });
                        
                        if (response.ok) {
                            localStorage.setItem("isAdminLoggedIn", "true");
                            this.$router.push("/dashboard");
                        } else {
                            const data = await response.json();
                            this.error = data.message || "Login failed";
                        }
                    } catch (error) {
                        console.error("Login failed:", error);
                        this.error = "Terjadi kesalahan saat login";
                    }
                }
            }
        };

        // Dashboard Component (Simplified)
        const Dashboard = {
            template: `
                <div class="min-h-screen bg-gray-50">
                    <nav class="bg-white/90 backdrop-blur shadow-sm">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between h-16">
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                        <i class="fa-solid fa-gauge"></i>
                                    </span>
                                    <h1 class="text-xl font-bold tracking-tight text-gray-800">Admin Dashboard</h1>
                                </div>
                                <div class="flex items-center gap-4">
                                    <router-link to="/umkm" class="px-4 py-2 text-sm text-white bg-blue-500 hover:bg-blue-600 rounded-md shadow">
                                        Kelola UMKM
                                    </router-link>
                                    <button @click="handleLogout" 
                                            class="px-4 py-2 text-sm text-white bg-red-500 hover:bg-red-600 rounded-md shadow">
                                        Logout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
                        <div class="px-4 sm:px-0 space-y-8">
                            <h2 class="text-2xl font-bold mb-2">Welcome back, Admin</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm text-gray-500">Total Products</p>
                                            <p class="text-3xl font-extrabold text-gray-900">@{{ productCount }}</p>
                                        </div>
                                        <span class="h-12 w-12 inline-flex items-center justify-center rounded-full bg-blue-50 text-blue-600">
                                            <i class="fa-solid fa-box"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            `,
            data() {
                return {
                    productCount: 0
                }
            },
            created() {
                if (!localStorage.getItem("isAdminLoggedIn")) {
                    this.$router.push("/login");
                }
            },
            methods: {
                handleLogout() {
                    localStorage.removeItem("isAdminLoggedIn");
                    this.$router.push("/login");
                },
                async fetchProductCount() {
                    try {
                        const response = await fetch('/api/products');
                        const data = await response.json();
                        this.productCount = data.length;
                    } catch (e) {
                        console.error('Failed to fetch products:', e);
                    }
                }
            },
            mounted() {
                this.fetchProductCount();
            }
        };

        // UMKM Component (Simplified)
        const UMKM = {
            template: `
                <div class="min-h-screen bg-gray-50">
                    <nav class="bg-white/90 backdrop-blur shadow-sm">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between h-16 items-center">
                                <h1 class="text-xl font-bold">Kelola Produk UMKM</h1>
                                <div class="flex items-center gap-4">
                                    <button @click="openCreate" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Tambah Produk</button>
                                    <router-link to="/dashboard" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600">Dashboard</router-link>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
                        <div class="px-4 sm:px-0">
                            <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                                                <th class="px-4 py-3"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100">
                                            <tr v-for="product in products" :key="product.id" class="hover:bg-gray-50">
                                                <td class="px-4 py-3 text-sm font-medium text-gray-900">@{{ product.name }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-600">@{{ product.category || '-' }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-600">Rp @{{ (product.price || 0).toLocaleString() }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-600">@{{ product.stock }}</td>
                                                <td class="px-4 py-3 text-right whitespace-nowrap">
                                                    <button @click="openEdit(product)" class="px-3 py-1.5 text-xs bg-yellow-500 text-white rounded mr-2 hover:bg-yellow-600">Edit</button>
                                                    <button @click="confirmDelete(product)" class="px-3 py-1.5 text-xs bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            `,
            data() {
                return {
                    products: []
                }
            },
            created() {
                if (!localStorage.getItem("isAdminLoggedIn")) {
                    this.$router.push("/login");
                    return;
                }
                this.fetchProducts();
            },
            methods: {
                async fetchProducts() {
                    try {
                        const response = await fetch('/api/products');
                        const data = await response.json();
                        this.products = data;
                    } catch (e) {
                        console.error('Failed to fetch products:', e);
                    }
                },
                openCreate() {
                    alert('Fitur tambah produk akan tersedia segera');
                },
                openEdit(product) {
                    alert(`Edit produk: ${product.name}`);
                },
                async confirmDelete(product) {
                    if (confirm(`Hapus produk "${product.name}"?`)) {
                        try {
                            await fetch(`/api/products/${product.id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                }
                            });
                            await this.fetchProducts();
                        } catch (e) {
                            console.error('Failed to delete product:', e);
                        }
                    }
                }
            }
        };

        // Router configuration
        const routes = [
            { path: '/', component: Home },
            { path: '/produk-lokal', component: ProdukLokal },
            { path: '/sejarah', component: Sejarah },
            { path: '/login', component: Login },
            { path: '/dashboard', component: Dashboard },
            { path: '/umkm', component: UMKM }
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
