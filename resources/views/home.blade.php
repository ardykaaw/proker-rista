@extends('layouts.app')

@section('title', 'Beranda - Desa Rakadua')

@section('content')
<div class="min-h-screen animate-fade-in">
    <!-- Hero Section -->
    <div class="relative h-screen">
        <!-- Full-width background image -->
        <div class="absolute inset-0">
            <img
                id="hero-image"
                src="{{ asset('images/herosection/bg-hero2.jpg') }}"
                alt="Hero Image"
                class="w-full h-full object-cover"
                onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
            />
            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-black/30"></div>
        </div>

        <!-- Hero Content -->
        <div
            class="absolute z-10 h-full w-full flex flex-col justify-center px-4 sm:px-6 md:px-20"
        >
            <div class="max-w-7xl mx-auto w-full">
                <h1
                    class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight"
                    style="font-family: 'Poppins', sans-serif"
                >
                    DESA<br class="sm:hidden" />
                    RAKADUA
                </h1>
                <p
                    class="text-base sm:text-lg md:text-xl text-white mb-6 sm:mb-8 max-w-lg"
                    style="font-family: 'Poppins', sans-serif"
                >
                    Informasi Seputar UMKM Desa Rakadua
                </p>
                <a
                    href="{{ route('produk') }}"
                    class="inline-block w-full sm:w-auto bg-white bg-opacity-50 text-[#0992d6] px-6 sm:px-8 py-3 rounded-md font-semibold hover:bg-[#0992d6] hover:text-white transition-colors duration-300 text-center text-sm sm:text-base"
                >
                    CEK SEKARANG
                </a>
            </div>
        </div>

        <!-- Carousel Navigation -->
        <div
            class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10"
        >
            <button
                class="carousel-dot w-3 h-3 rounded-full transition-all duration-300 bg-white"
                data-index="0"
            ></button>
            <button
                class="carousel-dot w-3 h-3 rounded-full transition-all duration-300 bg-white/50"
                data-index="1"
            ></button>
            <button
                class="carousel-dot w-3 h-3 rounded-full transition-all duration-300 bg-white/50"
                data-index="2"
            ></button>
            <button
                class="carousel-dot w-3 h-3 rounded-full transition-all duration-300 bg-white/50"
                data-index="3"
            ></button>
            <button
                class="carousel-dot w-3 h-3 rounded-full transition-all duration-300 bg-white/50"
                data-index="4"
            ></button>
        </div>
    </div>

    <!-- Tentang Kami Section -->
    <div
        class="py-12 sm:py-16 bg-gray-100 tentang-kami"
    >
        <div
            class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-6 md:gap-8"
        >
            <div class="w-full md:w-1/2 md:pr-4">
                <h2
                    class="text-2xl sm:text-3xl font-bold text-left mb-2"
                    style="
                        font-family: 'Inter', sans-serif;
                        color: #323233;
                    "
                >
                    Desa Rakadua, Kabupaten Bombana
                </h2>
                <span class="block w-16 h-1 bg-[#0992d6] my-1 mb-6"></span>
                <p
                    class="text-left mb-4 text-sm sm:text-base"
                    style="
                        font-family: 'Noto Sans', sans-serif;
                        color: #929394;
                        line-height: 1.6;
                    "
                >
                Desa Rakadua, berada di Kecamatan Poleang Barat, Kabupaten Bombana, adalah wilayah pesisir yang memiliki kekayaan budaya dan potensi ekonomi yang khas. Dikelilingi perairan yang menjadi jalur utama kehidupan masyarakat, Desa Rakadua memiliki sektor kelautan yang berkembang pesat, terutama di bidang perikanan tangkap dan UMKM berbasis hasil laut.
                </p>
                <p
                    class="text-left text-sm sm:text-base"
                    style="
                        font-family: 'Noto Sans', sans-serif;
                        color: #929394;
                        line-height: 1.6;
                    "
                >
                Masyarakat Rakadua memiliki keterikatan mendalam dengan budaya bahari: pelaku UMKM, khususnya perempuan pesisir, memproduksi aneka olahan laut bernilai tambah, seperti ikan kering, terasi, dan produk kreatif lainnya.
                </p>
            </div>
            <div class="w-full md:w-1/2">
                <img
                    src="{{ asset('images/tentang-kami/image1.jpg') }}"
                    alt="Desa Wisata Wanurejo"
                    class="w-full h-auto rounded-lg shadow-md"
                    onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                />
            </div>
        </div>
    </div>

    <!-- Berita dan Event Section -->
    <div
        class="py-12 sm:py-16 bg-gray-100 berita-event"
    >
        <div class="container mx-auto px-4">
            <h2
                class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8"
                style="color: #1a1a1a"
            >
                Berita dan Event
            </h2>
            <div class="flex justify-end items-center mb-8 sm:mb-12">
                <a
                    href="#"
                    class="text-[#0992d6] hover:text-[#0882c0] font-semibold flex items-center text-sm sm:text-base"
                >
                    Lihat Semua
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Event Card 1 -->
                <div
                    class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105"
                >
                    <div
                        class="w-full h-48 sm:h-56 lg:h-64 bg-gray-200 flex items-center justify-center"
                    >
                        <img
                            src="{{ asset('images/berita/WhatsApp Image 2025-09-05 at 12.35.33.jpeg') }}"
                            alt="Lomba Foto & Reels"
                            class="object-cover w-full h-full"
                            onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                        />
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="font-bold text-lg sm:text-xl mb-2">
                            Pawai se Kecamatan Poleang Barat
                        </h3>
                        <p class="text-sm sm:text-base text-gray-600 mb-4">
                            Pawai Se Kecamatan Poleang Barat dalam rangka memperingati Hari Kemerdekaan Republik Indonesia ke 80 bersama...
                        </p>
                        <button
                            onclick="showComingSoonAlert()"
                            class="w-full sm:w-auto bg-[#0992d6] text-white px-4 py-2 rounded hover:bg-[#0882c0] transition-colors duration-200 text-sm sm:text-base"
                        >
                            Lihat Selengkapnya
                        </button>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div
                    class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105"
                >
                    <div
                        class="w-full h-48 sm:h-56 lg:h-64 bg-gray-200 flex items-center justify-center"
                    >
                        <img
                            src="{{ asset('images/berita/WhatsApp Image 2025-09-05 at 12.44.50.jpeg') }}"
                            alt="Event Bulan November 2022"
                            class="object-cover w-full h-full"
                            onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                        />
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="font-bold text-lg sm:text-xl mb-2">
                            Gerak Jalan Desa Rakadua
                        </h3>
                        <p class="text-sm sm:text-base text-gray-600 mb-4">
                            Defile Ibu PKK Desa Rakadua dalam kegiatan Gerak Jalan Se Kecamatan Poleang Barat...
                        </p>
                        <button
                            onclick="showComingSoonAlert()"
                            class="w-full sm:w-auto bg-[#0992d6] text-white px-4 py-2 rounded hover:bg-[#0882c0] transition-colors duration-200 text-sm sm:text-base"
                        >
                            Lihat Selengkapnya
                        </button>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div
                    class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105 sm:col-span-2 lg:col-span-1"
                >
                    <div
                        class="w-full h-48 sm:h-56 lg:h-64 bg-gray-200 flex items-center justify-center"
                    >
                        <img
                            src="{{ asset('images/berita/foto-log-book-1756512049.jpeg') }}"
                            alt="Pagelaran Seni"
                            class="object-cover w-full h-full"
                            onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                        />
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="font-bold text-lg sm:text-xl mb-2">
                            Sosialisasi Gemar Menabung
                        </h3>
                        <p class="text-sm sm:text-base text-gray-600 mb-4">
                            Sosialisasi GEMBIRA SEJAK DINI(Gemar Menabung Bina Kemandirian Sejak Dini) di SDN 90 Rakadua
                        </p>
                        <button
                            onclick="showComingSoonAlert()"
                            class="w-full sm:w-auto bg-[#0992d6] text-white px-4 py-2 rounded hover:bg-[#0882c0] transition-colors duration-200 text-sm sm:text-base"
                        >
                            Lihat Selengkapnya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Galery Section -->
    <div
        id="gallery"
        class="bg-gray-50 py-12 sm:py-16 gallery"
    >
        <div class="container mx-auto px-4">
            <h2
                class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8"
                style="color: #1a1a1a"
            >
                Foto Desa Kami
            </h2>
            <div class="flex justify-end mb-6 sm:mb-8">
                <a
                    href="#"
                    class="text-[#0992d6] hover:text-[#0882c0] flex items-center text-sm sm:text-base"
                >
                    Lihat Semua
                </a>
            </div>
            <p
                class="text-center mb-8 sm:mb-12 text-sm sm:text-base"
                style="font-family: 'Noto Sans', sans-serif; color: #1a1a1a"
            >
                Dokumentasi kegiatan dan keindahan Desa Rakadua
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 sm:gap-6">
                <!-- Large image spanning 8 columns -->
                <div
                    class="sm:col-span-2 lg:col-span-8 bg-white rounded-lg overflow-hidden shadow-md relative group"
                >
                    <img
                        src="{{ asset('images/galery/galeri1.jpg') }}"
                        alt="Desa Foto 1"
                        class="w-full h-48 sm:h-64 lg:h-[400px] object-cover"
                        onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                    />
                    <div
                        class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"
                    >
                        <p class="text-white/100 p-4 text-sm sm:text-base">
                            Keindahan Pantai Desa Rakadua
                        </p>
                    </div>
                </div>

                <!-- Two smaller images stacked vertically -->
                <div class="sm:col-span-2 lg:col-span-4 grid grid-rows-2 gap-4 sm:gap-6">
                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-md relative group"
                    >
                        <img
                            src="{{ asset('images/galery/galeri2.jpg') }}"
                            alt="Desa Foto 2"
                            class="w-full h-32 sm:h-40 lg:h-[190px] object-cover"
                            onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                        />
                        <div
                            class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"
                        >
                            <p class="text-white/100 p-3 sm:p-4 text-xs sm:text-sm">
                                Aktivitas Nelayan
                            </p>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-md relative group"
                    >
                        <img
                            src="{{ asset('images/galery/galeri3.jpg') }}"
                            alt="Desa Foto 3"
                            class="w-full h-32 sm:h-40 lg:h-[190px] object-cover"
                            onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                        />
                        <div
                            class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"
                        >
                            <p class="text-white/100 p-3 sm:p-4 text-xs sm:text-sm">
                                Kehidupan Masyarakat
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Large image spanning 6 columns -->
                <div
                    class="sm:col-span-2 lg:col-span-6 bg-white rounded-lg overflow-hidden shadow-md relative group"
                >
                    <img
                        src="{{ asset('images/galery/galeri4.jpg') }}"
                        alt="Desa Foto 4"
                        class="w-full h-48 sm:h-56 lg:h-[300px] object-cover"
                        onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                    />
                    <div
                        class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"
                    >
                        <p class="text-white/100 p-3 sm:p-4 text-sm sm:text-base">
                            Dermaga Nelayan
                        </p>
                    </div>
                </div>

                <!-- Two smaller images side by side -->
                <div
                    class="sm:col-span-1 lg:col-span-3 bg-white rounded-lg overflow-hidden shadow-md relative group"
                >
                    <img
                        src="{{ asset('images/galery/galeri5.jpg') }}"
                        alt="Desa Foto 5"
                        class="w-full h-48 sm:h-56 lg:h-[300px] object-cover"
                        onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                    />
                    <div
                        class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"
                    >
                        <p class="text-white/100 p-3 sm:p-4 text-xs sm:text-sm">
                            UMKM Lokal
                        </p>
                    </div>
                </div>
                <div
                    class="sm:col-span-1 lg:col-span-3 bg-white rounded-lg overflow-hidden shadow-md relative group"
                >
                    <img
                        src="{{ asset('images/galery/galeri6.jpg') }}"
                        alt="Desa Foto 6"
                        class="w-full h-48 sm:h-56 lg:h-[300px] object-cover"
                        onerror="this.src='{{ asset('images/placeholder.jpg') }}'"
                    />
                    <div
                        class="absolute bottom-0 left-0 right-0 h-1/4 bg-black/30 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300"
                    >
                        <p class="text-white/100 p-3 sm:p-4 text-xs sm:text-sm">
                            Budaya Lokal
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Disabled all JavaScript to prevent video looping -->
<!-- 
<script>
    // Carousel data
    const carouselImages = [
        {
            id: 1,
            src: "/images/herosection/bg-hero2.jpg",
            alt: "Hero Image 1",
        },
        {
            id: 2,
            src: "/images/herosection/bg-hero6.jpeg",
            alt: "Hero Image 2",
        },
        {
            id: 3,
            src: "/images/herosection/bg-hero3.jpg",
            alt: "Hero Image 3",
        },
        {
            id: 4,
            src: "/images/herosection/bg-hero7.jpeg",
            alt: "Hero Image 4",
        },
        {
            id: 5,
            src: "/images/herosection/bg-hero5.jpeg",
            alt: "Hero Image 5",
        },
    ];

    let currentImage = 0;
    let carouselInterval = null;
    const heroImage = document.getElementById('hero-image');
    const dots = document.querySelectorAll('.carousel-dot');

    // Initialize carousel
    function initCarousel() {
        updateCarousel();
        // startCarousel(); // Disabled to prevent looping
    }

    // Update carousel display
    function updateCarousel() {
        heroImage.src = carouselImages[currentImage].src;
        heroImage.alt = carouselImages[currentImage].alt;
        
        // Update dots
        dots.forEach((dot, index) => {
            if (index === currentImage) {
                dot.classList.remove('bg-white/50');
                dot.classList.add('bg-white');
            } else {
                dot.classList.remove('bg-white');
                dot.classList.add('bg-white/50');
            }
        });
    }

    // Next image
    function nextImage() {
        currentImage = (currentImage + 1) % carouselImages.length;
        updateCarousel();
    }

    // Previous image
    function prevImage() {
        currentImage = currentImage === 0 ? carouselImages.length - 1 : currentImage - 1;
        updateCarousel();
    }

    // Start auto carousel - DISABLED
    function startCarousel() {
        // Auto carousel disabled to prevent looping issues
        return;
    }

    // Stop auto carousel
    function stopCarousel() {
        if (carouselInterval) {
            clearInterval(carouselInterval);
            carouselInterval = null;
        }
    }

    // Dot click handler
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentImage = index;
            updateCarousel();
        });
    });

    // Scroll animations
    function initScrollAnimations() {
        const sections = [
            'tentang-kami',
            'berita-event',
            'gallery'
        ];

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        element.classList.remove('invisible');
                        element.classList.add('opacity-100');
                        element.style.transform = 'none';
                    }
                });
            },
            {
                threshold: 0.1,
                rootMargin: '50px',
            }
        );

        // Observe all sections
        sections.forEach((section) => {
            const element = document.querySelector('.' + section);
            if (element) {
                observer.observe(element);
            }
        });
    }

    // Coming soon alert
    function showComingSoonAlert() {
        // Create overlay
        const overlay = document.createElement('div');
        overlay.className = 'custom-alert-overlay';
        overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            animation: fadeIn 0.3s ease-out;
        `;

        // Create alert box
        const alertBox = document.createElement('div');
        alertBox.className = 'custom-alert-box';
        alertBox.style.cssText = `
            background: white;
            border-radius: 12px;
            padding: 24px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            text-align: center;
            animation: slideIn 0.3s ease-out;
            position: relative;
        `;

        // Create icon
        const icon = document.createElement('div');
        icon.style.cssText = `
            width: 48px;
            height: 48px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px auto;
        `;
        icon.innerHTML = `
            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        `;

        // Create title
        const title = document.createElement('h3');
        title.textContent = 'Fitur Akan Tersedia';
        title.style.cssText = `
            margin: 0 0 8px 0;
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        `;

        // Create message
        const message = document.createElement('p');
        message.textContent = 'Fitur ini akan tersedia segera';
        message.style.cssText = `
            margin: 0 0 20px 0;
            font-size: 14px;
            color: #6b7280;
            line-height: 1.5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        `;

        // Create button
        const button = document.createElement('button');
        button.textContent = 'OK';
        button.style.cssText = `
            background: #6366f1;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        `;

        // Add hover effect
        button.addEventListener('mouseenter', () => {
            button.style.backgroundColor = '#5b5bd6';
        });
        button.addEventListener('mouseleave', () => {
            button.style.backgroundColor = '#6366f1';
        });

        // Close function
        const closeAlert = () => {
            alertBox.style.animation = 'slideOut 0.3s ease-in';
            overlay.style.animation = 'fadeOut 0.3s ease-in';
            setTimeout(() => {
                document.body.removeChild(overlay);
            }, 300);
        };

        // Add click events
        button.addEventListener('click', closeAlert);
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) closeAlert();
        });

        // Assemble alert
        alertBox.appendChild(icon);
        alertBox.appendChild(title);
        alertBox.appendChild(message);
        alertBox.appendChild(button);
        overlay.appendChild(alertBox);
        document.body.appendChild(overlay);

        // Add CSS animations
        if (!document.getElementById('custom-alert-styles')) {
            const style = document.createElement('style');
            style.id = 'custom-alert-styles';
            style.textContent = `
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
                @keyframes fadeOut {
                    from { opacity: 1; }
                    to { opacity: 0; }
                }
                @keyframes slideIn {
                    from { 
                        opacity: 0;
                        transform: translateY(-20px) scale(0.95);
                    }
                    to { 
                        opacity: 1;
                        transform: translateY(0) scale(1);
                    }
                }
                @keyframes slideOut {
                    from { 
                        opacity: 1;
                        transform: translateY(0) scale(1);
                    }
                    to { 
                        opacity: 0;
                        transform: translateY(-20px) scale(0.95);
                    }
                }
            `;
            document.head.appendChild(style);
        }
    }

    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // initCarousel(); // Disabled to prevent video looping
        // initScrollAnimations(); // Disabled to prevent content hiding
    });

    // Clean up when page is unloaded
    window.addEventListener('beforeunload', function() {
        stopCarousel();
    });

    // Clean up when page is hidden (mobile)
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            stopCarousel();
        } else {
            // startCarousel(); // Disabled to prevent looping
        }
    });
</script>
-->

<style>
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

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
    visibility: hidden;
}

.opacity-0 {
    opacity: 0;
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

/* Custom Alert Styles - Professional Design */
.custom-alert-overlay {
    backdrop-filter: blur(4px);
}

.custom-alert-box {
    border: 1px solid rgba(0, 0, 0, 0.1);
}

.custom-alert-box button:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
}
</style>
@endsection