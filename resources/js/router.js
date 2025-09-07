import { createRouter, createWebHistory } from 'vue-router'
import Home from './components/Home.vue'
import Dewatari from './components/Dewatari.vue'
import ProdukLokal from './components/ProdukLokal.vue'
import PaketTour from './components/PaketTour.vue'
import Informasi from './components/Informasi.vue'
import PembelianTiket from './components/PembelianTiket.vue'
import Sejarah from './components/Sejarah.vue'
import VisiMisi from './components/VisiMisi.vue'
import Login from './components/Login.vue'
import Dashboard from './components/Dashboard.vue'
import UMKM from './components/UMKM.vue'
import GalleryFoto from './components/GalleryFoto.vue'
import GalleryVideo from './components/GalleryVideo.vue'


const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  // {
  //   path: '/dewatari',
  //   name: 'dewatari',
  //   component: Dewatari
  // },
  {
    path: '/produk-lokal',
    name: 'produk-lokal',
    component: ProdukLokal
  },
  {
    path: '/paket-tour',
    name: 'paket-tour',
    component: PaketTour
  },
  {
    path: '/informasi',
    name: 'informasi',
    component: Informasi
  },
  {
    path: '/pembelian-tiket',
    name: 'pembelian-tiket',
    component: PembelianTiket
  },
  {
    path: '/sejarah',
    name: 'Sejarah',
    component: Sejarah
  },
  {
    path: '/visi-misi',
    name: 'VisiMisi',
    component: VisiMisi
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: { requiresAuth: true }
  }
  ,  {
    path: '/umkm',
    name: 'umkm',
    component: UMKM,
    meta: { requiresAuth: true }
  },
  {
    path: '/gallery-foto',
    name: 'gallery-foto',
    component: GalleryFoto
  },
  {
    path: '/gallery-video',
    name: 'gallery-video',
    component: GalleryVideo
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const isLoggedIn = localStorage.getItem('isAdminLoggedIn') === 'true'
  if (to.meta?.requiresAuth && !isLoggedIn) {
    next({ name: 'login' })
  } else if (to.name === 'login' && isLoggedIn) {
    next({ name: 'dashboard' })
  } else {
    next()
  }
})

export default router 