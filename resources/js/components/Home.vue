<template>
    <div class="min-h-screen animate-fade-in">
        <Navbar />
        <WhatsAppButton />
        <!-- Navbar -->

        <!-- Hero Section -->
        <div class="relative h-screen">
            <!-- Full-width background image -->
            <div class="absolute inset-0">
                <img
                    :src="carouselImages[currentImage].src"
                    :alt="carouselImages[currentImage].alt"
                    class="w-full h-full object-cover"
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
                    <router-link
                        to="/produk-lokal"
                        class="inline-block w-full sm:w-auto bg-white bg-opacity-50 text-[#0992d6] px-6 sm:px-8 py-3 rounded-md font-semibold hover:bg-[#0992d6] hover:text-white transition-colors duration-300 text-center text-sm sm:text-base"
                    >
                        CEK SEKARANG
                    </router-link>
                </div>
            </div>

            <!-- Carousel Navigation -->
            <div
                class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10"
            >
                <button
                    v-for="(image, index) in carouselImages"
                    :key="index"
                    @click="currentImage = index"
                    class="w-3 h-3 rounded-full transition-all duration-300"
                    :class="currentImage === index ? 'bg-white' : 'bg-white/50'"
                ></button>
            </div>
        </div>

        <!-- Tentang Kami Section -->
        <div
            class="py-12 sm:py-16 bg-gray-100 invisible opacity-0 transition-all duration-1000"
            ref="tentangKami"
            style="transform: translateY(20px)"
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
                        src="/images/tentang-kami/image1.jpg"
                        alt="Desa Wisata Wanurejo"
                        class="w-full h-auto rounded-lg shadow-md"
                    />
                </div>
            </div>
        </div>

        <!-- Berita dan Event Section -->
        <div
            class="py-12 sm:py-16 bg-gray-100 invisible opacity-0 transition-all duration-1000"
            ref="beritaEvent"
            style="transform: translateX(-100px)"
        >
            <div class="container mx-auto px-4">
                <h2
                    class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8"
                    style="color: #1a1a1a"
                >
                    Berita dan Event
                </h2>
                <div class="flex justify-end items-center mb-8 sm:mb-12">
                    <router-link
                        to="/informasi"
                        class="text-[#0992d6] hover:text-[#0882c0] font-semibold flex items-center text-sm sm:text-base"
                    >
                        Lihat Semua
                    </router-link>
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
                                src="/images/berita/WhatsApp Image 2025-09-05 at 12.35.33.jpeg"
                                alt="Lomba Foto & Reels"
                                class="object-cover w-full h-full"
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
                                @click="showComingSoonAlert"
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
                                src="/images/berita/WhatsApp Image 2025-09-05 at 12.44.50.jpeg"
                                alt="Event Bulan November 2022"
                                class="object-cover w-full h-full"
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
                                @click="showComingSoonAlert"
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
                                src="/images/berita/foto-log-book-1756512049.jpeg"
                                alt="Pagelaran Seni"
                                class="object-cover w-full h-full"
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
                                @click="showComingSoonAlert"
                                class="w-full sm:w-auto bg-[#0992d6] text-white px-4 py-2 rounded hover:bg-[#0882c0] transition-colors duration-200 text-sm sm:text-base"
                            >
                                Lihat Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tour Packages Section -->
        

        <!-- Galery Section -->
        <div
            id="gallery"
            class="bg-gray-50 py-12 sm:py-16 invisible opacity-0 transition-all duration-1000"
            ref="gallery"
            style="transform: scale(0.95)"
        >
            <div class="container mx-auto px-4">
                <h2
                    class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8"
                    style="color: #1a1a1a"
                >
                    Foto Desa Kami
                </h2>
                <div class="flex justify-end mb-6 sm:mb-8">
                    <router-link
                        to="/paket-tour"
                        class="text-[#0992d6] hover:text-[#0882c0] flex items-center text-sm sm:text-base"
                    >
                        Lihat Semua
                    </router-link>
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
                            src="/images/galery/galeri1.jpg"
                            alt="Desa Foto 1"
                            class="w-full h-48 sm:h-64 lg:h-[400px] object-cover"
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
                                src="/images/galery/galeri2.jpg"
                                alt="Desa Foto 2"
                                class="w-full h-32 sm:h-40 lg:h-[190px] object-cover"
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
                                src="/images/galery/galeri3.jpg"
                                alt="Desa Foto 3"
                                class="w-full h-32 sm:h-40 lg:h-[190px] object-cover"
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
                            src="/images/galery/galeri4.jpg"
                            alt="Desa Foto 4"
                            class="w-full h-48 sm:h-56 lg:h-[300px] object-cover"
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
                            src="/images/galery/galeri5.jpg"
                            alt="Desa Foto 5"
                            class="w-full h-48 sm:h-56 lg:h-[300px] object-cover"
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
                            src="/images/galery/galeri6.jpg"
                            alt="Desa Foto 6"
                            class="w-full h-48 sm:h-56 lg:h-[300px] object-cover"
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

        <!-- Footer -->
        <footer
            class="bg-gradient-to-br from-[#1a1a1a] to-[#2d2d2d] text-white py-12 sm:py-16"
        >
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-6 sm:gap-8">
                    <!-- Contact & Social Media -->
                    <div class="sm:col-span-2 lg:col-span-4">
                        <img
                            src="/images/logo/logo-umkm.png"
                            alt="Logo Bungkutoko"
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
                                <router-link
                                    to="/"
                                    class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base"
                                    >Home</router-link
                                >
                            </li>
                            <li>
                                <router-link
                                    to="/sejarah"
                                    class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base"
                                    >Sejarah</router-link
                                >
                            </li>
                            <li>
                                <router-link
                                    to="/produk-lokal"
                                    class="text-gray-300 hover:text-[#0992d6] transition-colors text-sm sm:text-base"
                                    >Produk Lokal</router-link
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
    </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import WhatsAppButton from "./WhatsAppButton.vue";

export default {
    name: "Home",
    components: {
        Navbar,
        WhatsAppButton,
    },
    data() {
        return {
            currentImage: 0,
            carouselImages: [
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
            ],
            navItems: [
                { name: "Home", path: "/" },
                { name: "Bungkutoko", path: "/dewatari" },
                { name: "Produk Lokal", path: "/produk-lokal" },
                { name: "Paket Tour", path: "/paket-tour" },
                { name: "Informasi", path: "/informasi" },
                { name: "Pembelian Tiket", path: "/pembelian-tiket" },
            ],
            teamMembers: [
                { name: "Asep Saefullah", image: "/path-to-asep-image.jpg" },
                { name: "Aulia Naresti", image: "/path-to-aulia-image.jpg" },
                { name: "Nabila Aminatun", image: "/path-to-nabila-image.jpg" },
                {
                    name: "Bintang Shallahuddin",
                    image: "/path-to-bintang-image.jpg",
                },
                { name: "David Aditya", image: "/path-to-david-image.jpg" },
                { name: "Daffa Hafid", image: "/path-to-daffa-image.jpg" },
            ],
        };
    },
    methods: {
        nextImage() {
            this.currentImage =
                (this.currentImage + 1) % this.carouselImages.length;
        },
        prevImage() {
            this.currentImage =
                this.currentImage === 0
                    ? this.carouselImages.length - 1
                    : this.currentImage - 1;
        },
        startCarousel() {
            setInterval(this.nextImage, 5000); // Change image every 5 seconds
        },
        initScrollAnimations() {
            const sections = [
                "tentangKami",
                "beritaEvent",
                "tourPackages",
                "gallery",
            ];

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const element = entry.target;
                            element.classList.remove("invisible");
                            element.classList.add("opacity-100");
                            element.style.transform = "none";
                        }
                    });
                },
                {
                    threshold: 0.1,
                    rootMargin: "50px",
                }
            );

            // Observe all sections
            sections.forEach((section) => {
                const element = this.$refs[section];
                if (element) {
                    observer.observe(element);
                }
            });
        },
        showComingSoonAlert() {
            // Create custom professional alert
            this.showCustomAlert();
        },
        showCustomAlert() {
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
        },
    },
    mounted() {
        this.startCarousel();
        // Slight delay to ensure DOM is ready
        setTimeout(() => {
            this.initScrollAnimations();
        }, 100);
    },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

.router-link-active {
    font-weight: 600;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.fade-enter-to,
.fade-leave-from {
    opacity: 1;
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

.animate-fade-in {
    animation: fadeIn 1s ease-out forwards;
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
