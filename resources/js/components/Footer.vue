<template>
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
</template>

<script>
export default {
  name: 'Footer'
}
</script>

<style scoped>
/* Add any additional styles here if needed */
</style> 