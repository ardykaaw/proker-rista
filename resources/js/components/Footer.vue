<template>
  <footer
            class="bg-gradient-to-br from-[#1a1a1a] to-[#2d2d2d] text-white py-16"
        >
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                    <!-- Contact & Social Media -->
                    <div class="md:col-span-4">
                        <img
                            src="/images/logo/logo-umkm.png"
                            alt="Logo Bungkutoko"
                            class="h-24 mb-6"
                        />
                        <p class="text-gray-300 mb-6">
                            Jelajahi Keberagaman UMKM Desa Rakadua
                        </p>
                        <div class="flex space-x-4">
                            <a
                                href="#"
                                class="bg-white/10 hover:bg-[#0992d6] p-3 rounded-full transition-colors"
                            >
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a
                                href="#"
                                class="bg-white/10 hover:bg-[#0992d6] p-3 rounded-full transition-colors"
                            >
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a
                                href="#"
                                class="bg-white/10 hover:bg-[#0992d6] p-3 rounded-full transition-colors"
                            >
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold mb-4"></h4>
                        <ul class="space-y-2">
                            <li>
                                <router-link
                                    to="/"
                                    class="text-gray-300 hover:text-[#0992d6] transition-colors"
                                    ></router-link
                                >
                            </li>
                            <li>
                                <router-link
                                    to="/sejarah"
                                    class="text-gray-300 hover:text-[#0992d6] transition-colors"
                                    ></router-link
                                >
                            </li>
                            
                            
                        </ul>
                    </div>

                    <!-- Wisata -->
                    <div class="md:col-span-3">
                        <h4 class="text-lg font-semibold mb-4">
                           
                        </h4>
                        <ul class="space-y-2">
                            <li class="text-gray-300"></li>
                            <li class="text-gray-300"></li>
                            <li class="text-gray-300"></li>
                            <li class="text-gray-300"></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="md:col-span-3">
                        <h4 class="text-lg font-semibold mb-4">Hubungi Kami</h4>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <i
                                    class="fas fa-map-marker-alt mt-1 text-[#0992d6]"
                                ></i>
                                <p class="text-gray-300">
                                    Desa Rakadua, Kec. Poleang Barat, Kab. Bombana
                                    , Sulawesi Tenggara
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-phone text-[#0992d6]"></i>
                                <p class="text-gray-300">+62 00-0000-0000</p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-envelope text-[#0992d6]"></i>
                                <p class="text-gray-300">rakadua@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div
                    class="border-t border-white/10 mt-12 pt-8 text-center text-gray-400"
                >
                    <p>
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