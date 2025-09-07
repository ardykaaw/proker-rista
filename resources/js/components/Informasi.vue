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
      <div class="relative z-10 h-full flex flex-col justify-center items-start px-20 max-w-7xl mx-auto">
        <h1 class="text-6xl font-bold text-white mb-4" style="font-family: 'Poppins', sans-serif;">
          Informasi
        </h1>
        <p class="text-xl text-white mb-8" style="font-family: 'Poppins', sans-serif;">
          
        </p>
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

      <!-- Carousel Arrows -->
      <button 
        @click="prevImage" 
        class="absolute left-5 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full z-10"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button 
        @click="nextImage" 
        class="absolute right-5 top-1/2 transform -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-2 rounded-full z-10"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>

    <!-- Content Section -->
    <div class="py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Informasi Terkini</h2>
        <!-- Add your information content here -->
      </div>
    </div>

    <Footer />
  </div>
</template>

<script>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'

export default {
  name: 'Informasi',
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
    }
  },
  mounted() {
    this.startCarousel()
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

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
</style> 