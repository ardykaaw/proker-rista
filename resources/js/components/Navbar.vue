<template>
    <nav class="absolute top-0 left-0 right-0 z-50 py-4 bg-transparent">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <img
                        src="/images/logo/logo-gabung.png"
                        alt="Logo"
                        class="h-24 mr-2"
                    />
                </div>

                <!-- Mobile Menu Button -->
                <button
                    @click="isMobileMenuOpen = !isMobileMenuOpen"
                    class="lg:hidden text-white focus:outline-none"
                >
                    <svg
                        class="w-6 h-6"
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

            <!-- Mobile Menu -->
            <div
                v-show="isMobileMenuOpen"
                class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40"
                @click="isMobileMenuOpen = false"
            >
                <div
                    class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-xl z-50"
                    @click.stop
                >
                    <div class="flex flex-col h-full overflow-y-auto">
                        <div class="p-6">
                            <!-- Close Button -->
                            <div class="flex justify-end mb-6">
                                <button
                                    @click="isMobileMenuOpen = false"
                                    class="text-gray-500 hover:text-gray-700"
                                >
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Mobile Menu Items -->
                            <nav class="space-y-4">
                                <router-link
                                    to="/"
                                    class="block py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-md transition-colors"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Home
                                </router-link>

                                <router-link
                                    to="/sejarah"
                                    class="block py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-md transition-colors"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Sejarah Desa
                                </router-link>

                                <router-link
                                    to="/produk-lokal"
                                    class="block py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-md transition-colors"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Produk Lokal
                                </router-link>

                                <a
                                    href="#gallery"
                                    class="block py-3 px-4 text-gray-800 hover:text-[#0992d6] hover:bg-gray-50 rounded-md transition-colors"
                                    @click="isMobileMenuOpen = false"
                                >
                                    Gallery
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
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
