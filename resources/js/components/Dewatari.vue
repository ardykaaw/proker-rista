<template>
  <div class="min-h-screen">
    <Navbar />

    <!-- Hero Section -->
    <div class="relative h-screen">
      <!-- Full-width background image -->
      <div class="absolute inset-0">
        <img 
          :src="carouselImages[currentImage].src" 
          :alt="carouselImages[currentImage].alt"
          class="w-full h-full object-cover"
        >
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black/30"></div>
      </div>

      <!-- Hero Content -->
      <div class="absolute z-10 h-full flex flex-col justify-center items-start px-20 max-w-7xl mx-auto">
        <h1 class="text-6xl font-bold text-white mb-4" style="font-family: 'Poppins', sans-serif;">
          Wisata Desa Bungkutoko
        </h1>
        <p class="text-xl text-white mb-8" style="font-family: 'Poppins', sans-serif;">
          Jelajahi keindahan wisata Desa Taman Sari
        </p>
        <button class="bg-white text-[#0992d6] px-8 py-3 rounded-md font-semibold hover:bg-[#0992d6] hover:text-white transition-colors duration-300">
          RESERVASI SEKARANG
        </button>
      </div>

      <!-- Carousel Navigation -->
      <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
        <button 
          v-for="(image, index) in carouselImages" 
          :key="index"
          @click="currentImage = index"
          class="w-3 h-3 rounded-full transition-all duration-300"
          :class="currentImage === index ? 'bg-white' : 'bg-white/50'"
        ></button>
      </div>
    </div>

    <!-- Content Section -->
    <div class="py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Destinasi Wisata Desa Bungkuroko</h2>
        
        <!-- Horizontal Scrollable Cards -->
        <div class="relative">
          <!-- Scroll Container -->
          <div class="overflow-x-auto pb-6 hide-scrollbar">
            <div class="flex space-x-6 min-w-max px-4">
              <!-- Card 1 -->
              <div class="bg-white rounded-lg shadow-lg overflow-hidden w-[350px] flex-shrink-0">
                <img src="/images/wisata/wisata1.jpg" alt="Wisata 1" class="w-full h-64 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Pantai Taman Sari</h3>
                  <p class="text-gray-600 mb-4">Nikmati keindahan pantai dengan pasir putih dan air yang jernih. Cocok untuk berenang dan berjemur.</p>
                  <div class="flex justify-between items-center">
                    <span class="text-[#0891d7] font-bold">Rp 25.000/orang</span>
                    <button class="bg-[#0891d7] text-white px-4 py-2 rounded-lg hover:bg-[#c98a0e] transition">Lihat Detail</button>
                  </div>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="bg-white rounded-lg shadow-lg overflow-hidden w-[350px] flex-shrink-0">
                <img src="/images/wisata/wisata2.jpg" alt="Wisata 2" class="w-full h-64 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Taman Bunga</h3>
                  <p class="text-gray-600 mb-4">Taman bunga yang indah dengan berbagai jenis bunga. Tempat yang sempurna untuk berfoto.</p>
                  <div class="flex justify-between items-center">
                    <span class="text-[#0891d7] font-bold">Rp 15.000/orang</span>
                    <button class="bg-[#0891d7] text-white px-4 py-2 rounded-lg hover:bg-[#c98a0e] transition">Lihat Detail</button>
                  </div>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="bg-white rounded-lg shadow-lg overflow-hidden w-[350px] flex-shrink-0">
                <img src="/images/wisata/wisata3.jpg" alt="Wisata 3" class="w-full h-64 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Air Terjun Taman Sari</h3>
                  <p class="text-gray-600 mb-4">Air terjun alami dengan pemandangan yang menyegarkan. Ideal untuk refreshing.</p>
                  <div class="flex justify-between items-center">
                    <span class="text-[#0891d7] font-bold">Rp 20.000/orang</span>
                    <button class="bg-[#0891d7] text-white px-4 py-2 rounded-lg hover:bg-[#c98a0e] transition">Lihat Detail</button>
                  </div>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="bg-white rounded-lg shadow-lg overflow-hidden w-[350px] flex-shrink-0">
                <img src="/images/wisata/wisata4.jpg" alt="Wisata 4" class="w-full h-64 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Kebun Raya</h3>
                  <p class="text-gray-600 mb-4">Kebun raya dengan koleksi tanaman yang beragam. Cocok untuk edukasi dan rekreasi.</p>
                  <div class="flex justify-between items-center">
                    <span class="text-[#0891d7] font-bold">Rp 18.000/orang</span>
                    <button class="bg-[#0891d7] text-white px-4 py-2 rounded-lg hover:bg-[#c98a0e] transition">Lihat Detail</button>
                  </div>
                </div>
              </div>

              <!-- Card 5 -->
              <div class="bg-white rounded-lg shadow-lg overflow-hidden w-[350px] flex-shrink-0">
                <img src="/images/wisata/wisata5.jpg" alt="Wisata 5" class="w-full h-64 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Desa Budaya</h3>
                  <p class="text-gray-600 mb-4">Kunjungi desa budaya dan nikmati pertunjukan seni tradisional yang memukau.</p>
                  <div class="flex justify-between items-center">
                    <span class="text-[#0891d7] font-bold">Rp 30.000/orang</span>
                    <button class="bg-[#0891d7] text-white px-4 py-2 rounded-lg hover:bg-[#c98a0e] transition">Lihat Detail</button>
                  </div>
                </div>
              </div>

              <!-- Card 6 -->
              <div class="bg-white rounded-lg shadow-lg overflow-hidden w-[350px] flex-shrink-0">
                <img src="/images/wisata/wisata6.jpg" alt="Wisata 6" class="w-full h-64 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-bold mb-2">Agrowisata</h3>
                  <p class="text-gray-600 mb-4">Nikmati pengalaman bertani dan memetik buah langsung dari kebunnya.</p>
                  <div class="flex justify-between items-center">
                    <span class="text-[#0891d7] font-bold">Rp 22.000/orang</span>
                    <button class="bg-[#0891d7] text-white px-4 py-2 rounded-lg hover:bg-[#c98a0e] transition">Lihat Detail</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Optional: Scroll Buttons -->
          <button 
            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full z-10"
            @click="scrollLeft"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button 
            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full z-10"
            @click="scrollRight"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-gray-100 py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Hubungi Kami</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Alamat -->
          <div class="flex flex-col items-center text-center">
            <div class="bg-[#0891d7] p-4 rounded-full mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Alamat</h3>
            <p class="text-gray-600">Desa Taman Sari, Kecamatan Gedangan,<br/>Kabupaten Malang, Jawa Timur</p>
          </div>

          <!-- Email -->
          <div class="flex flex-col items-center text-center">
            <div class="bg-[#0891d7] p-4 rounded-full mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Email</h3>
            <p class="text-gray-600">info@dewatari.com</p>
          </div>

          <!-- Telepon -->
          <div class="flex flex-col items-center text-center">
            <div class="bg-[#0891d7] p-4 rounded-full mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Telepon</h3>
            <p class="text-gray-600">+62 812-3456-7890</p>
          </div>
        </div>
      </div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'

export default {
  name: 'Dewatari',
  components: {
    Navbar,
    Footer
  },
  data() {
    return {
      currentImage: 0,
      carouselImages: [
        {
          id: 1,
          src: '/images/herosection/bg-hero.jpg',
          alt: 'Hero Image 1'
        },
        {
          id: 2,
          src: '/images/herosection/bg-hero2.jpg',
          alt: 'Hero Image 2'
        },
        {
          id: 3,
          src: '/images/herosection/bg-hero3.jpg',
          alt: 'Hero Image 3'
        },
        {
          id: 4,
          src: '/images/herosection/bg-hero4.jpg',
          alt: 'Hero Image 4'
        },
        {
          id: 5,
          src: '/images/herosection/bg-hero5.jpg',
          alt: 'Hero Image 5'
        }
      ],
      navItems: [
        { name: 'Home', path: '/' },
        { name: 'Bungkutoko', path: '/dewatari' },
        { name: 'Produk Lokal', path: '/produk-lokal' },
        { name: 'Paket Tour', path: '/paket-tour' },
        { name: 'Informasi', path: '/informasi' },
        { name: 'Pembelian Tiket', path: '/pembelian-tiket' }
      ]
    }
  },
  methods: {
    nextImage() {
      this.currentImage = (this.currentImage + 1) % this.carouselImages.length
    },
    prevImage() {
      this.currentImage = this.currentImage === 0 
        ? this.carouselImages.length - 1 
        : this.currentImage - 1
    },
    startCarousel() {
      setInterval(this.nextImage, 5000)
    },
    scrollLeft() {
      const container = document.querySelector('.overflow-x-auto');
      container.scrollBy({ left: -400, behavior: 'smooth' });
    },
    scrollRight() {
      const container = document.querySelector('.overflow-x-auto');
      container.scrollBy({ left: 400, behavior: 'smooth' });
    }
  },
  mounted() {
    this.startCarousel()
  }
}
</script>

<style scoped>
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

.hide-scrollbar::-webkit-scrollbar {
  display: none;
}

.hide-scrollbar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style> 