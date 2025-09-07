<template>
  <div>
    <Navbar />
    <div class="relative h-screen">
      <!-- Full-width background image -->
      <div class="absolute inset-0">
        <img 
          src="/images/herosection/bg-hero.jpg" 
          alt="Hero Image"
          class="w-full h-full object-cover"
        >
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black/30"></div>
      </div>

      <!-- Hero Content with Cards -->
      <div class="relative z-10 h-full flex flex-col justify-center items-center px-20 max-w-7xl mx-auto">
        <div class="flex space-x-4">
          <div class="relative w-1/2 group overflow-hidden">
            <img src="/images/visi-misi/visi.jpeg" alt="Visi" class="w-full h-full object-cover">
            <div class="absolute inset-0 flex flex-col justify-center items-center bg-white rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-10 group-hover:translate-y-0 z-index-10 ">
              <h3 class="font-bold text-2xl text-center text-black">Visi</h3>
              <p class="text-center mt-2">#1</p>
              <p class="text-center">Terwujudnya pengembangan Obyek Wisata Desa Tista yang berkualitas, berwawasan, berkelanjutan dan mempunyai daya saing berdasarkan budaya dan Tri Hita Karana.</p>
            </div>
          </div>
          <div class="relative w-1/2 group overflow-hidden">
            <img src="/images/visi-misi/misi1.jpeg" alt="Misi" class="w-full h-full object-cover ">
            <div class="absolute inset-0 flex flex-col justify-center items-center bg-white rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-10 group-hover:translate-y-0">
              <h3 class="font-bold text-2xl text-center">Misi</h3>
              <p class="text-center mt-2">#2</p>
              <p class="text-center">Misi kami adalah untuk meningkatkan kualitas hidup masyarakat melalui pengembangan pariwisata yang berkelanjutan dan ramah lingkungan.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <h2>Visi & Misi Desa Bungkutoko</h2>
      <!-- Tambahkan konten visi misi desa di sini -->
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'

export default {
  name: 'VisiMisi',
  components: {
    Navbar,
    Footer
  }
}
</script>

<style scoped>
/* Add any additional styles here if needed */
</style> 