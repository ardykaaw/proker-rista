<template>
    <nav class="absolute top-0 left-0 right-0 z-50 py-2 md:py-4 bg-transparent">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <img
                        src="/images/logo/logo-gabung.png"
                        alt="Logo"
                        class="h-16 md:h-20 lg:h-24 mr-2"
                    />
                </div>

                <!-- Mobile Menu Button -->
                <button
                    @click="isMobileMenuOpen = !isMobileMenuOpen"
                    class="lg:hidden text-white focus:outline-none p-2 rounded-md hover:bg-white/10 transition-colors"
                    :class="{ 'bg-white/10': isMobileMenuOpen }"
                >
                    <svg
                        class="w-6 h-6 transition-transform duration-300"
                        :class="{ 'rotate-90': isMobileMenuOpen }"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            v-if="!isMobileMenuOpen"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            v-else
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-6">
                    <router-link
                        to="/"
                        class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]"
                    >
                        Home
                    </router-link>

                    <router-link
                        to="/sejarah"
                        class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]"
                    >
                        Sejarah Desa
                    </router-link>

                    <router-link
                        to="/produk-lokal"
                        class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]"
                    >
                        Produk Lokal
                    </router-link>

                    <a
                        href="/#gallery"
                        class="text-white uppercase font-['Open_Sans'] text-[14px] tracking-wider transition-colors hover:text-[#0992d6]"
                    >
                        Gallery
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Overlay -->
            <transition
                enter-active-class="transition-opacity duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="transition-opacity duration-300"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    v-show="isMobileMenuOpen"
                    class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40"
                    @click="isMobileMenuOpen = false"
                >
                    <transition
                        enter-active-class="transition-transform duration-300 ease-out"
                        enter-from-class="translate-x-full"
                        enter-to-class="translate-x-0"
                        leave-active-class="transition-transform duration-300 ease-in"
                        leave-from-class="translate-x-0"
                        leave-to-class="translate-x-full"
                    >
                        <div
                            v-show="isMobileMenuOpen"
                            class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-xl z-50"
                            @click.stop
                        >
                            <div class="flex flex-col h-full">
                                <!-- Header -->
                                <div class="flex items-center justify-between p-6 border-b border-gray-200">
                                    <img
                                        src="/images/logo/logo-gabung.png"
                                        alt="Logo"
                                        class="h-12"
                                    />
                                    <button
                                        @click="isMobileMenuOpen = false"
                                        class="text-gray-500 hover:text-gray-700 p-2 rounded-md hover:bg-gray-100 transition-colors"
                                    >
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Mobile Menu Items -->
                                <nav class="flex-1 px-6 py-6">
                                    <div class="space-y-2">
                                        <router-link
                                            to="/"
                                            class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium"
                                            @click="isMobileMenuOpen = false"
                                        >
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            Home
                                        </router-link>

                                        <router-link
                                            to="/sejarah"
                                            class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium"
                                            @click="isMobileMenuOpen = false"
                                        >
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                            Sejarah Desa
                                        </router-link>

                                        <router-link
                                            to="/produk-lokal"
                                            class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium"
                                            @click="isMobileMenuOpen = false"
                                        >
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                            </svg>
                                            Produk Lokal
                                        </router-link>

                                        <a
                                            href="#gallery"
                                            class="flex items-center py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-lg transition-all duration-200 font-medium"
                                            @click="isMobileMenuOpen = false"
                                        >
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Gallery
                                        </a>
                                    </div>
                                </nav>

                                <!-- Footer -->
                                <div class="p-6 border-t border-gray-200">
                                    <p class="text-sm text-gray-500 text-center">
                                        Desa Rakadua, Kabupaten Bombana
                                    </p>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
            </transition>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
    data() {
        return {
            isMobileMenuOpen: false,
        };
    },
    mounted() {
        // Close mobile menu on route change
        this.$router.afterEach(() => {
            this.isMobileMenuOpen = false;
        });
    },
};
</script>

<style scoped>
/* Add transitions */
.absolute {
    transition: opacity 0.2s ease-in-out;
}

/* Mobile menu transition */
.fixed {
    transition: all 0.3s ease-in-out;
}
</style>
