<template>
  <div>
    <Navbar />
    <!-- Hero Section -->
    <div class="relative h-screen">
      <div class="absolute inset-0">
        <img 
          :src="carouselImages[currentImage].src" 
          :alt="carouselImages[currentImage].alt"
          class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-black/30"></div>
      </div>
      <div class="absolute z-10 h-full flex flex-col justify-center items-start px-20 max-w-7xl mx-auto">
        <h1 class="text-6xl font-bold text-white mb-4" style="font-family: 'Poppins', sans-serif;">
          Gallery Video
        </h1>
        <p class="text-xl text-white mb-8" style="font-family: 'Poppins', sans-serif;">
          Lihat koleksi video menarik kami
        </p>
        <button class="bg-white bg-opacity-50 text-[#0992d6] px-8 py-3 rounded-md font-semibold hover:bg-[#0992d6] hover:text-white transition-colors duration-300">
          Lihat Selengkapnya
        </button>
      </div>
    </div>
    <h1>Gallery Video</h1>
    <!-- Tambahkan konten gallery video di sini -->
    <Footer />
  </div>
</template>

<script>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'

export default {
  name: 'GalleryVideo',
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
      ]
    }
  },
  methods: {
    nextImage() {
      this.currentImage = (this.currentImage + 1) % this.carouselImages.length
    },
    startCarousel() {
      setInterval(this.nextImage, 5000) // Change image every 5 seconds
    }
  },
  mounted() {
    this.startCarousel()
  }
}
</script> 