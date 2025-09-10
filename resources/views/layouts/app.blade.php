<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Desa Rakadua')</title>
    <meta name="description" content="Desa Rakadua - Desa Wisata dan Produk Lokal Kabupaten Bombana">
    <meta name="keywords" content="desa wisata, produk lokal, rakadua, wisata desa, bombana, sulawesi tenggara">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Desa Rakadua">
    <meta property="og:description" content="Desa Wisata dan Produk Lokal Kabupaten Bombana">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Desa Rakadua">
    <meta name="twitter:description" content="Desa Wisata dan Produk Lokal Kabupaten Bombana">
    
    <!-- Tailwind CSS CDN - Production Version -->
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                        'poppins': ['Poppins', 'sans-serif'],
                        'noto': ['Noto Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        /* Image fallback system */
        .img-fallback {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            text-align: center;
        }
        
        .img-fallback::before {
            content: "No Image Available";
        }
        
        /* Ensure images load properly */
        img {
            max-width: 100%;
            height: auto;
        }
        
        /* Loading state for images */
        img[data-src] {
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        img[data-src].loaded {
            opacity: 1;
        }
        .navbar-transparent {
            background-color: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .navbar-solid {
            background-color: #ffffff !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
            border-bottom: 1px solid #e5e7eb;
        }
        
        /* Force white background when scrolled */
        .navbar-solid {
            background: #ffffff !important;
        }
        
        .navbar-solid .text-white {
            color: #1f2937 !important;
        }
        
        .navbar-solid .text-white:hover {
            color: #0992d6 !important;
        }
        
        /* Force text color change */
        .navbar-solid a {
            color: #1f2937 !important;
        }
        
        .navbar-solid a:hover {
            color: #0992d6 !important;
        }
        
        .navbar-solid .mobile-menu-button {
            color: #1f2937 !important;
        }
        
        .navbar-solid .mobile-menu-button:hover {
            background-color: rgba(0, 0, 0, 0.1) !important;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        /* Custom animations */
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
        
        /* Additional animation classes */
        .invisible {
            visibility: visible !important;
        }
        
        .opacity-0 {
            opacity: 1 !important;
        }
        
        .opacity-100 {
            opacity: 1;
            visibility: visible;
        }
        
        .transition-all {
            transition: all 1s ease-out;
        }
        
        .duration-1000 {
            transition-duration: 1000ms;
        }
        
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 60;
        }
        
        .mobile-menu.open {
            transform: translateX(0);
        }
        
        .mobile-menu-overlay {
            transition: opacity 0.3s ease;
        }
        
        .mobile-menu-overlay.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        .mobile-menu-overlay:not(.hidden) {
            opacity: 1;
            pointer-events: auto;
        }
        
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        
        .whatsapp-float:hover {
            transform: scale(1.1);
        }
        
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
        
        .smooth-scroll {
            scroll-behavior: smooth;
        }
        
        .touch-pan-x {
            touch-action: pan-x;
        }
    </style>
</head>
<body class="bg-gray-50 smooth-scroll">
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 py-2 md:py-4 navbar-transparent">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <img
                        src="{{ asset('images/logo/rakadua_logo.png') }}"
                        alt="Logo"
                        class="h-16 md:h-20 lg:h-24 mr-2"
                        
                    />
                </div>

                <!-- Mobile Menu Button -->
                <button
                    id="mobile-menu-button"
                    class="lg:hidden text-gray-800 focus:outline-none p-2 rounded-md hover:bg-gray-100 transition-colors"
                >
                    <svg
                        id="mobile-menu-icon"
                        class="w-6 h-6 transition-transform duration-300"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            id="hamburger-icon"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            id="close-icon"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-6">
                    <a
                        href="{{ route('home') }}"
                        class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6] {{ request()->routeIs('home') ? 'text-[#0992d6]' : '' }}"
                    >
                        Home
                    </a>

                    <a
                        href="{{ route('sejarah') }}"
                        class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6] {{ request()->routeIs('sejarah') ? 'text-[#0992d6]' : '' }}"
                    >
                        Sejarah Desa
                    </a>

                    <a
                        href="{{ route('produk') }}"
                        class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6] {{ request()->routeIs('produk') ? 'text-[#0992d6]' : '' }}"
                    >
                        Produk Lokal
                    </a>

                    <a
                        href="#gallery"
                        class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]"
                    >
                        Gallery
                    </a>

                    <a
                        href="{{ route('admin.login') }}"
                        class="bg-[#0992d6] hover:bg-[#0882c0] text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200"
                        style="font-family: 'Inter', sans-serif"
                    >
                        Login Admin
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Overlay -->
            <div
                id="mobile-menu-overlay"
                class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden"
            >
                <div
                    id="mobile-menu"
                    class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out"
                >
                    <div class="flex flex-col h-full">
                        <!-- Header -->
                        <div class="flex items-center justify-between p-6 border-b border-gray-200">
                            <img
                                src="{{ asset('images/logo/rakadua_logo.png') }}"
                                alt="Logo"
                                class="h-12"
                                
                            />
                            <button
                                id="close-mobile-menu"
                                class="text-gray-500 hover:text-gray-700 p-2 rounded-md hover:bg-gray-100 transition-colors"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Mobile Menu Items -->
                        <nav class="flex-1 px-6 py-6">
                            <div class="space-y-2">
                                <a
                                    href="{{ route('home') }}"
                                    class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium {{ request()->routeIs('home') ? 'text-[#0992d6] bg-gray-50' : '' }}"
                                >
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Home
                                </a>

                                <a
                                    href="{{ route('sejarah') }}"
                                    class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium {{ request()->routeIs('sejarah') ? 'text-[#0992d6] bg-gray-50' : '' }}"
                                >
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    Sejarah Desa
                                </a>

                                <a
                                    href="{{ route('produk') }}"
                                    class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium {{ request()->routeIs('produk') ? 'text-[#0992d6] bg-gray-50' : '' }}"
                                >
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    Produk Lokal
                                </a>

                                <a
                                    href="#gallery"
                                    class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium"
                                >
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Gallery
                                </a>

                                <a
                                    href="{{ route('admin.login') }}"
                                    class="flex items-center py-3 px-4 bg-[#0992d6] text-white hover:bg-[#0882c0] rounded-lg transition-all duration-200 font-medium mt-4"
                                >
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    Login Admin
                                </a>
                            </div>
                        </nav>

                        <!-- Footer -->
                        <div class="p-6 border-t border-gray-200">
                            <p class="text-sm text-gray-500 text-center">
                                Desa Rakadua, Kabupaten Bombana
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-gradient-to-br from-[#1a1a1a] to-[#2d2d2d] text-white py-12 sm:py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-6 sm:gap-8">
                <!-- Contact & Social Media -->
                <div class="sm:col-span-2 lg:col-span-4">
                    <img
                        src="{{ asset('images/logo/rakadua_logo.png') }}"
                        alt="Logo Desa Rakadua"
                        class="h-16 sm:h-20 lg:h-24 mb-4 sm:mb-6"
                       
                    />
                    <p class="text-gray-300 mb-4 sm:mb-6 text-sm sm:text-base">
                        Jelajahi Keberagaman UMKM Desa Rakadua
                    </p>
                    <div class="flex space-x-3 sm:space-x-4">
                        <a
                            href="#"
                            class="bg-white/10 hover:bg-[#0992d6] p-2 sm:p-3 rounded-full transition-colors"
                        >
                            <i class="fab fa-instagram text-lg sm:text-xl"></i>
                        </a>
                        <a
                            href="#"
                            class="bg-white/10 hover:bg-[#0992d6] p-2 sm:p-3 rounded-full transition-colors"
                        >
                            <i class="fab fa-facebook text-lg sm:text-xl"></i>
                        </a>
                        <a
                            href="#"
                            class="bg-white/10 hover:bg-[#0992d6] p-2 sm:p-3 rounded-full transition-colors"
                        >
                            <i class="fab fa-youtube text-lg sm:text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="sm:col-span-1 lg:col-span-2">
                    <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li>
                            <a
                                href="{{ route('home') }}"
                                class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base"
                                >Home</a
                            >
                        </li>
                        <li>
                            <a
                                href="{{ route('sejarah') }}"
                                class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base"
                                >Sejarah</a
                            >
                        </li>
                        <li>
                            <a
                                href="{{ route('produk') }}"
                                class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base"
                                >Produk Lokal</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Wisata -->
                <div class="sm:col-span-1 lg:col-span-3">
                    <h4 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4">
                       Wisata
                    </h4>
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
                            <i
                                class="fas fa-map-marker-alt mt-1 text-[#0992d6] text-sm sm:text-base"
                            ></i>
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
            <div
                class="border-t border-white/10 mt-8 sm:mt-12 pt-6 sm:pt-8 text-center text-gray-400"
            >
                <p class="text-sm sm:text-base">
                    &copy; 2024 Desa Rakadua. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    
    <!-- WhatsApp Button -->
    <div class="whatsapp-float">
        <a href="#" target="_blank" class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-300 flex items-center space-x-2">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
            </svg>
            <span class="hidden sm:block text-sm font-medium">WhatsApp</span>
        </a>
    </div>
    
    <!-- JavaScript -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 20) {
                navbar.classList.remove('navbar-transparent');
                navbar.classList.add('navbar-solid');
                // Force white background
                navbar.style.backgroundColor = '#ffffff';
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.classList.remove('navbar-solid');
                navbar.classList.add('navbar-transparent');
                // Reset to transparent
                navbar.style.backgroundColor = '';
                navbar.style.boxShadow = '';
            }
        });
        
        // Mobile menu toggle
        let isMobileMenuOpen = false;
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
        const closeMobileMenuBtn = document.getElementById('close-mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');
        
        function toggleMobileMenu() {
            isMobileMenuOpen = !isMobileMenuOpen;
            
            if (isMobileMenuOpen) {
                openMobileMenu();
            } else {
                closeMobileMenu();
            }
        }
        
        function openMobileMenu() {
            mobileMenuOverlay.classList.remove('hidden');
            mobileMenu.classList.remove('translate-x-full');
            hamburgerIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
            mobileMenuButton.classList.add('bg-white/10');
            document.body.style.overflow = 'hidden';
        }
        
        function closeMobileMenu() {
            mobileMenuOverlay.classList.add('hidden');
            mobileMenu.classList.add('translate-x-full');
            hamburgerIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            mobileMenuButton.classList.remove('bg-white/10');
            document.body.style.overflow = '';
            isMobileMenuOpen = false;
        }
        
        // Event listeners
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', toggleMobileMenu);
        }
        
        if (closeMobileMenuBtn) {
            closeMobileMenuBtn.addEventListener('click', closeMobileMenu);
        }
        
        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', closeMobileMenu);
        }
        
        // Close mobile menu when clicking on links
        if (mobileMenu) {
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', closeMobileMenu);
            });
        }
        
        // Close mobile menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMobileMenuOpen) {
                closeMobileMenu();
            }
        });
        
        // Close mobile menu on window resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                closeMobileMenu();
            }
        });
        
        // Image fallback system - only for images that actually fail to load
        function initImageFallback() {
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                // Only add fallback if image doesn't have onerror attribute
                if (!img.hasAttribute('onerror')) {
                    img.addEventListener('error', function() {
                        console.log('Image failed to load:', this.src);
                        this.style.display = 'none';
                        const fallback = document.createElement('div');
                        fallback.className = 'img-fallback';
                        fallback.style.width = this.style.width || '100%';
                        fallback.style.height = this.style.height || '200px';
                        this.parentNode.insertBefore(fallback, this);
                    });
                }
                
                // Add load handler
                img.addEventListener('load', function() {
                    this.classList.add('loaded');
                });
            });
        }
        
        // Initialize image fallback when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initImageFallback();
        });
    </script>
    
    @yield('scripts')
</body>
</html>
