<template>
  <div>
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
      <div class="relative z-10 h-full flex flex-col justify-start items-center px-20 max-w-7xl mx-auto pt-42">
        <h1 class="text-6xl font-bold text-white mb-4" style="font-family: 'Poppins', sans-serif;">
          Sejarah Desa Rakadua
        </h1>
        <p class="text-sm text-white mb-8 text-center" style="font-family: 'Poppins', sans-serif;">
          Sejarah singkat Rakadua tidak terlepas dari asal-usul namanya. Nama Rakadua diyakini berasal dari bahasa lokal setempat, yang berarti “dua rakit” atau “dua jalur” — merujuk pada letak desa yang berada di antara dua alur perairan yang menjadi jalur transportasi dan perdagangan masyarakat. Pada masa lampau, wilayah ini dikenal sebagai titik singgah nelayan dan pedagang yang melintas di pesisir barat Poleang. Mereka menggunakan rakit atau perahu kecil untuk menyeberang dan membawa hasil laut, sehingga sebutan Rakadua perlahan melekat.

Awal mula pemukiman di Rakadua diyakini berasal dari kelompok masyarakat pesisir yang terdiri dari suku-suku lokal Poleang, yang kemudian berinteraksi dengan pendatang dari Bugis, Buton, dan Bajo. Pendatang ini umumnya datang untuk berdagang atau mencari penghidupan di sektor kelautan. Hubungan pernikahan dan perdagangan membuat komunitas Rakadua semakin beragam, namun tetap memegang budaya maritim yang kuat.
        </p>
        <p class="text-sm text-white mb-8 text-center" style="font-family: 'Poppins', sans-serif;">
          Pada masa kolonial Belanda, Rakadua menjadi salah satu titik penting di jalur perairan Teluk Bone yang menghubungkan beberapa desa pesisir di Poleang Barat. Meskipun tidak menjadi pusat militer atau perdagangan besar, keberadaan dermaga kecil dan jalur laut menjadikan Rakadua dikenal sebagai desa nelayan yang ramai. Perahu layar tradisional kerap berlabuh untuk membawa ikan, garam, dan hasil kebun.

Pemukiman awal di Rakadua didominasi rumah panggung dari kayu, menghadap langsung ke laut atau sungai kecil di tepi desa. Posisi ini memudahkan masyarakat mengawasi perahu dan aktivitas tangkap ikan. Namun, seiring waktu dan kebijakan pembangunan pemerintah, pola pemukiman mulai bergeser. Rumah-rumah banyak dibangun mengikuti badan jalan utama, sebagian menjauh dari garis pantai, sehingga orientasi kehidupan yang dulunya sepenuhnya ke laut mulai beralih ke darat.

Hingga kini, Desa Rakadua tetap mempertahankan identitasnya sebagai desa pesisir. Sebagian besar penduduk masih bergantung pada sektor perikanan, baik tangkap maupun budidaya, sementara kelompok UMKM — terutama yang dikelola oleh perempuan — mengolah hasil laut menjadi produk bernilai jual. Budaya gotong royong, upacara adat, dan tradisi bahari tetap hidup, menjadikan Rakadua bukan hanya pusat aktivitas ekonomi pesisir, tetapi juga simpul budaya di Poleang Barat.
        </p>
      </div>
    </div>

    <!-- <div class="container mt-4">
      <h2>Sejarah Desa Bungkutoko</h2>
      
    </div> -->
    <Footer />
  </div>
</template>

<script>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'

export default {
  name: 'Sejarah',
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
          src: '/images/herosection/bg-hero4.jpeg',
          alt: 'Hero Image 4'
        },
        {
          id: 5,
          src: '/images/herosection/bg-hero5.jpeg',
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

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

.relative {
  position: relative;
}

.h-screen {
  height: 100vh;
}

.object-cover {
  object-fit: cover;
}

.bg-black\/30 {
  background-color: rgba(0, 0, 0, 0.3);
}
</style> 