@extends('layouts.app')

@section('title', 'Sejarah - Desa Rakadua')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-12 md:py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 md:mb-6">Sejarah Desa Rakadua</h1>
        <p class="text-lg sm:text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed">
            Mengenal lebih dekat perjalanan panjang dan warisan budaya Desa Rakadua
        </p>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-3 md:mb-4">Perjalanan Sejarah</h2>
            <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Dari masa lalu hingga masa kini, Desa Rakadua terus berkembang dengan mempertahankan nilai-nilai luhur
            </p>
        </div>
        
        <div class="relative">
            <!-- Timeline line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-blue-200 hidden lg:block"></div>
            
            <!-- Timeline items -->
            <div class="space-y-8 md:space-y-12">
                <!-- 1970s -->
                <div class="relative flex flex-col lg:flex-row items-center">
                    <div class="flex-1 w-full lg:pr-8 lg:text-right mb-6 lg:mb-0">
                        <div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg border-l-4 border-blue-500">
                            <div class="text-blue-600 font-semibold text-base md:text-lg mb-2">1970-an</div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3">Pendirian Sekolah Dasar</h3>
                            <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                                Era 1970-an menandai dimulainya pendidikan formal di Desa Rakadua dengan 
                                didirikannya SD Negeri 57 Rakadua pada 1 Juli 1971 berdasarkan SK Pendirian 
                                No. 421.1/2/1971. Masyarakat mulai mengenal pendidikan formal dan literasi 
                                sebagai fondasi pembangunan desa.
                            </p>
                        </div>
                    </div>
                    <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 w-full lg:pl-8">
                        <div class="bg-blue-50 p-4 md:p-6 rounded-2xl">
                            <div class="w-full h-32 md:h-48 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-16 h-16 md:w-20 md:h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                                        <svg class="w-8 h-8 md:w-10 md:h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-base md:text-lg font-semibold text-blue-800">Pendirian Sekolah</h4>
                                    <p class="text-xs md:text-sm text-blue-600">Era Pendidikan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 1980s -->
                <div class="relative flex flex-col lg:flex-row items-center">
                    <div class="flex-1 w-full lg:pr-8 mb-6 lg:mb-0">
                        <div class="bg-green-50 p-4 md:p-6 rounded-2xl">
                            <div class="w-full h-32 md:h-48 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-16 h-16 md:w-20 md:h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                                        <svg class="w-8 h-8 md:w-10 md:h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-base md:text-lg font-semibold text-green-800">Ekspansi Pendidikan</h4>
                                    <p class="text-xs md:text-sm text-green-600">Era Pengembangan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 w-full lg:pl-8 lg:text-left">
                        <div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg border-r-4 border-blue-500">
                            <div class="text-blue-600 font-semibold text-base md:text-lg mb-2">1980-an</div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3">Pembangunan SD Negeri 90 Rakadua</h3>
                            <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                                Era 1980-an ditandai dengan didirikannya SD Negeri 90 Rakadua pada tahun 1983 
                                di Jl. Anduri No. 320 Gambere dengan luas tanah 2.896 meter persegi. 
                                Hal ini memperluas akses pendidikan dasar bagi masyarakat desa.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- 1990s -->
                <div class="relative flex flex-col lg:flex-row items-center">
                    <div class="flex-1 w-full lg:pr-8 lg:text-right mb-6 lg:mb-0">
                        <div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg border-l-4 border-blue-500">
                            <div class="text-blue-600 font-semibold text-base md:text-lg mb-2">1990-an</div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3">Pembangunan SMP dan Masjid</h3>
                            <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                                Era 1990-an ditandai dengan didirikannya SMP Negeri 12 Poleang Barat (1997) 
                                dan pembangunan Masjid Nurul Taqwa (1999). Masyarakat mulai memiliki akses 
                                pendidikan menengah dan fasilitas keagamaan yang memadai.
                            </p>
                        </div>
                    </div>
                    <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 w-full lg:pl-8">
                        <div class="bg-purple-50 p-4 md:p-6 rounded-2xl">
                            <div class="w-full h-32 md:h-48 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-16 h-16 md:w-20 md:h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                                        <svg class="w-8 h-8 md:w-10 md:h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-base md:text-lg font-semibold text-purple-800">Pembangunan SMP</h4>
                                    <p class="text-xs md:text-sm text-purple-600">Era Pendidikan Lanjutan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 2000s -->
                <div class="relative flex flex-col lg:flex-row items-center">
                    <div class="flex-1 w-full lg:pr-8 lg:text-right mb-6 lg:mb-0">
                        <div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg border-l-4 border-blue-500">
                            <div class="text-blue-600 font-semibold text-base md:text-lg mb-2">2004</div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3">Pemekaran dan Ibu Kota Kecamatan</h3>
                            <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                                Tahun 2004 menjadi tonggak sejarah penting dengan pemekaran Kabupaten Bombana 
                                dari Kabupaten Buton. Desa Rakadua ditetapkan sebagai ibu kota Kecamatan 
                                Poleang Barat, menandai era baru dalam tata kelola pemerintahan.
                            </p>
                        </div>
                    </div>
                    <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 w-full lg:pl-8">
                        <div class="bg-purple-50 p-4 md:p-6 rounded-2xl">
                            <div class="w-full h-32 md:h-48 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-16 h-16 md:w-20 md:h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                                        <svg class="w-8 h-8 md:w-10 md:h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-base md:text-lg font-semibold text-purple-800">Ibu Kota Kecamatan</h4>
                                    <p class="text-xs md:text-sm text-purple-600">Era Pemekaran</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 2010s -->
                <div class="relative flex flex-col lg:flex-row items-center">
                    <div class="flex-1 w-full lg:pr-8 mb-6 lg:mb-0">
                        <div class="bg-orange-50 p-4 md:p-6 rounded-2xl">
                            <div class="w-full h-32 md:h-48 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-16 h-16 md:w-20 md:h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                                        <svg class="w-8 h-8 md:w-10 md:h-10 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-base md:text-lg font-semibold text-orange-800">Era Digital</h4>
                                    <p class="text-xs md:text-sm text-orange-600">Modernisasi Teknologi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 w-full lg:pl-8 lg:text-left">
                        <div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg border-r-4 border-blue-500">
                            <div class="text-blue-600 font-semibold text-base md:text-lg mb-2">2010-an</div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3">Era Digital dan Pertanian Kakao</h3>
                            <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                                Masuknya teknologi informasi membuka peluang baru bagi masyarakat. 
                                Sektor pertanian kakao berkembang pesat dengan motivasi petani yang tinggi (76,9%), 
                                berkontribusi pada peningkatan kesejahteraan masyarakat.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- 2020s -->
                <div class="relative flex flex-col lg:flex-row items-center">
                    <div class="flex-1 w-full lg:pr-8 lg:text-right mb-6 lg:mb-0">
                        <div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg border-l-4 border-blue-500">
                            <div class="text-blue-600 font-semibold text-base md:text-lg mb-2">2020-an</div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3">Pembangunan Kesehatan dan Administrasi</h3>
                            <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                                Era 2020-an ditandai dengan pembangunan Posyandu baru (2023) dengan anggaran 
                                Rp358 juta dan pelayanan administrasi kependudukan terpadu (2024). 
                                Desa Rakadua terus berkembang dengan 972 jiwa penduduk yang tersebar di 4 RT.
                            </p>
                        </div>
                    </div>
                    <div class="hidden lg:block absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                    <div class="flex-1 w-full lg:pl-8">
                        <div class="bg-teal-50 p-4 md:p-6 rounded-2xl">
                            <div class="w-full h-32 md:h-48 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-16 h-16 md:w-20 md:h-20 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4">
                                        <svg class="w-8 h-8 md:w-10 md:h-10 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-base md:text-lg font-semibold text-teal-800">Pembangunan Kesehatan</h4>
                                    <p class="text-xs md:text-sm text-teal-600">Era Modern</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-3 md:mb-4">Nilai-Nilai Luhur</h2>
            <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Nilai-nilai yang dipegang teguh oleh masyarakat Desa Rakadua dari generasi ke generasi. 
                Desa yang terletak di Kecamatan Poleang Barat, Kabupaten Bombana, dengan 972 jiwa penduduk 
                yang tersebar di 4 RT.
            </p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Gotong Royong -->
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg text-center card-hover">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                    <svg class="w-7 h-7 md:w-8 md:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4">Gotong Royong</h3>
                <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                    Semangat kebersamaan dan saling membantu dalam setiap kegiatan pembangunan desa 
                    dan kehidupan bermasyarakat.
                </p>
            </div>
            
            <!-- Kejujuran -->
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg text-center card-hover">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                    <svg class="w-7 h-7 md:w-8 md:h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4">Kejujuran</h3>
                <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                    Integritas dan kejujuran dalam setiap aspek kehidupan, mulai dari perdagangan 
                    hingga pelayanan masyarakat.
                </p>
            </div>
            
            <!-- Pelestarian Budaya -->
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg text-center card-hover">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                    <svg class="w-7 h-7 md:w-8 md:h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4">Pelestarian Budaya</h3>
                <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                    Komitmen untuk menjaga dan melestarikan warisan budaya, tradisi, dan kearifan lokal 
                    yang diwariskan dari nenek moyang.
                </p>
            </div>
            
            <!-- Inovasi -->
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg text-center card-hover">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                    <svg class="w-7 h-7 md:w-8 md:h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4">Inovasi</h3>
                <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                    Semangat untuk terus berinovasi dan beradaptasi dengan perkembangan zaman 
                    tanpa meninggalkan nilai-nilai luhur.
                </p>
            </div>
            
            <!-- Kemandirian -->
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg text-center card-hover">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                    <svg class="w-7 h-7 md:w-8 md:h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4">Kemandirian</h3>
                <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                    Kemampuan untuk mengelola sumber daya lokal dan mengembangkan potensi desa 
                    secara mandiri dan berkelanjutan.
                </p>
            </div>
            
            <!-- Keramahan -->
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg text-center card-hover">
                <div class="w-14 h-14 md:w-16 md:h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                    <svg class="w-7 h-7 md:w-8 md:h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4">Keramahan</h3>
                <p class="text-sm md:text-base text-gray-600 leading-relaxed">
                    Sifat ramah dan terbuka terhadap tamu dan pengunjung, menciptakan suasana 
                    yang hangat dan menyenangkan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission Section -->
<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
            <div class="order-2 lg:order-1">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-6 md:mb-8">Visi & Misi</h2>
                
                <!-- Vision -->
                <div class="mb-6 md:mb-8">
                    <h3 class="text-xl md:text-2xl font-semibold text-blue-600 mb-3 md:mb-4 flex items-center">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-2 md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        Visi
                    </h3>
                    <p class="text-base md:text-lg text-gray-700 leading-relaxed">
                        "Menjadi desa wisata yang berkelanjutan, mandiri, dan sejahtera dengan mempertahankan 
                        nilai-nilai budaya lokal dan mengembangkan potensi ekonomi kreatif yang ramah lingkungan."
                    </p>
                </div>
                
                <!-- Mission -->
                <div>
                    <h3 class="text-xl md:text-2xl font-semibold text-green-600 mb-3 md:mb-4 flex items-center">
                        <svg class="w-5 h-5 md:w-6 md:h-6 mr-2 md:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        Misi
                    </h3>
                    <ul class="space-y-2 md:space-y-3 text-sm md:text-base text-gray-700">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-green-500 mr-2 md:mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Melestarikan dan mengembangkan budaya lokal sebagai identitas desa
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-green-500 mr-2 md:mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Meningkatkan kesejahteraan masyarakat melalui pengembangan ekonomi kreatif
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-green-500 mr-2 md:mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Mengembangkan infrastruktur wisata yang berkelanjutan dan ramah lingkungan
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-green-500 mr-2 md:mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Memberdayakan masyarakat melalui pelatihan dan pengembangan keterampilan
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 md:w-5 md:h-5 text-green-500 mr-2 md:mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Membangun kemitraan strategis dengan berbagai pihak untuk pengembangan desa
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="relative order-1 lg:order-2">
                <img src="{{ asset('images/visi-misi/visi-misi1.jpeg') }}" alt="Visi Misi Desa Rakadua" class="rounded-2xl shadow-2xl w-full">
                <div class="absolute -bottom-3 md:-bottom-6 -right-3 md:-right-6 bg-white p-4 md:p-6 rounded-2xl shadow-xl">
                    <div class="flex items-center space-x-3 md:space-x-4">
                        <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-sm md:text-base text-gray-800">Berkelanjutan</div>
                            <div class="text-xs md:text-sm text-gray-600">Pembangunan yang berkelanjutan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Desa Section -->
<section class="py-12 md:py-16 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-3 md:mb-4">Struktur Pemerintahan Desa</h2>
            <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Organisasi pemerintahan Desa Rakadua yang terdiri dari Kepala Desa, Sekretaris Desa, 
                dan perangkat desa lainnya yang bertugas melayani masyarakat
            </p>
        </div>
        
        <!-- Struktur Organisasi -->
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl p-4 md:p-8 overflow-x-auto">
            <div class="min-w-full">
                <!-- Header -->
                <div class="text-center mb-6 md:mb-8">
                    <h3 class="text-lg md:text-2xl font-bold text-gray-800 mb-2">BAGAN STRUKTUR DESA</h3>
                    <p class="text-sm md:text-base text-gray-600">DESA RAKADUA - KECAMATAN POLEANG BARAT</p>
                </div>
                
                <!-- Struktur Chart -->
                <div class="relative">
                    <!-- Level 1: Kepala Desa -->
                    <div class="flex justify-center mb-8 md:mb-12">
                        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-2xl p-4 md:p-6 shadow-xl w-full max-w-sm text-center relative border-2 border-blue-500">
                            <div class="w-16 h-16 md:w-20 md:h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 md:mb-4 border-2 border-white/30">
                                <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-lg md:text-xl mb-2">Kepala Desa</h4>
                            <p class="font-semibold text-sm md:text-base mb-1">EDI SURIADI, S.Sos</p>
                            <p class="text-xs opacity-90 bg-white/10 px-2 md:px-3 py-1 rounded-full break-all">NIPD: 19770208 200507 1 001</p>
                            
                            <!-- Vertical line down from Kepala Desa -->
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full w-0.5 md:w-1 h-8 md:h-12 bg-gradient-to-b from-gray-400 to-gray-300"></div>
                        </div>
                    </div>
                    
                    <!-- Horizontal line connecting to Level 2 -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-3/4 md:w-4/5 h-0.5 md:h-1 bg-gradient-to-r from-gray-300 via-gray-400 to-gray-300 top-1/4 md:top-1/3 rounded-full"></div>
                    
                    <!-- Level 2: Sekretaris & Kasi -->
                    <div class="flex flex-col lg:flex-row justify-between items-center lg:items-start mb-8 md:mb-12 relative space-y-4 lg:space-y-0">
                        <!-- Sekretaris Desa -->
                        <div class="w-full lg:flex-1 lg:max-w-xs relative">
                            <div class="bg-gradient-to-r from-green-600 to-green-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center relative border-2 border-green-500">
                                <div class="w-14 h-14 md:w-16 md:h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                    <svg class="w-7 h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-base md:text-lg mb-2">Sekretaris Desa</h4>
                                <p class="font-semibold text-sm mb-1">MASRI, S.E</p>
                                <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19780208 200507 1 001</p>
                                
                                <!-- Vertical line down from Sekretaris -->
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full w-0.5 md:w-1 h-8 md:h-10 bg-gradient-to-b from-gray-400 to-gray-300"></div>
                            </div>
                        </div>
                        
                        <!-- Kasi -->
                        <div class="w-full lg:flex-1 flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4 lg:space-x-6">
                            <div class="bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center w-full md:max-w-xs relative border-2 border-purple-500">
                                <div class="w-12 h-12 md:w-14 md:h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-sm md:text-base mb-1">Kasi Kesejahteraan</h4>
                                <p class="font-semibold text-xs md:text-sm mb-1">MUH. SYAIR</p>
                                <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19820225 200507 1 001</p>
                                
                                <!-- Vertical line down from Kasi -->
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full w-0.5 md:w-1 h-8 md:h-10 bg-gradient-to-b from-gray-400 to-gray-300"></div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-orange-600 to-orange-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center w-full md:max-w-xs relative border-2 border-orange-500">
                                <div class="w-12 h-12 md:w-14 md:h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-sm md:text-base mb-1">Kasi Pelayanan</h4>
                                <p class="font-semibold text-xs md:text-sm mb-1">AHMAD, S.Pd</p>
                                <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19890512 200507 2 001</p>
                                
                                <!-- Vertical line down from Kasi -->
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full w-0.5 md:w-1 h-8 md:h-10 bg-gradient-to-b from-gray-400 to-gray-300"></div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-red-600 to-red-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center w-full md:max-w-xs relative border-2 border-red-500">
                                <div class="w-12 h-12 md:w-14 md:h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-sm md:text-base mb-1">Kasi Pemerintahan</h4>
                                <p class="font-semibold text-xs md:text-sm mb-1">DARUSMAN, S.Pd</p>
                                <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19860720 200507 2 001</p>
                                
                                <!-- Vertical line down from Kasi -->
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full w-0.5 md:w-1 h-8 md:h-10 bg-gradient-to-b from-gray-400 to-gray-300"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Horizontal line connecting to Level 3 -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-1/2 md:w-2/3 h-0.5 md:h-1 bg-gradient-to-r from-gray-300 via-gray-400 to-gray-300 top-2/3 rounded-full"></div>
                    
                    <!-- Level 3: Kaur -->
                    <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-8 lg:space-x-12 mb-8 md:mb-12 relative">
                        <div class="bg-gradient-to-r from-teal-600 to-teal-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center w-full md:max-w-xs relative border-2 border-teal-500">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                <svg class="w-7 h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-base md:text-lg mb-2">Kaur Keuangan</h4>
                            <p class="font-semibold text-sm mb-1">YUDIN</p>
                            <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19760511 200507 2 001</p>
                            
                            <!-- Vertical line down from Kaur -->
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full w-0.5 md:w-1 h-8 md:h-10 bg-gradient-to-b from-gray-400 to-gray-300"></div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-pink-600 to-pink-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center w-full md:max-w-xs relative border-2 border-pink-500">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                <svg class="w-7 h-7 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-base md:text-lg mb-2">Kaur TU & Umum</h4>
                            <p class="font-semibold text-sm mb-1">SARWATI SAFITRIANI, S.H</p>
                            <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19850307 200507 2 001</p>
                            
                            <!-- Vertical line down from Kaur -->
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full w-0.5 md:w-1 h-8 md:h-10 bg-gradient-to-b from-gray-400 to-gray-300"></div>
                        </div>
                    </div>
                    
                    <!-- Horizontal line connecting to Level 4 -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-3/4 md:w-5/6 h-0.5 md:h-1 bg-gradient-to-r from-gray-300 via-gray-400 to-gray-300 top-5/6 rounded-full"></div>
                    
                    <!-- Level 4: Kepala Dusun -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 relative">
                        <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center border-2 border-indigo-500">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-sm md:text-base mb-1">Dusun Ewolangka</h4>
                            <p class="font-semibold text-xs md:text-sm mb-1">MUSTAKING</p>
                            <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19770817 200507 2 001</p>
                        </div>
                        
                        <div class="bg-gradient-to-r from-cyan-600 to-cyan-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center border-2 border-cyan-500">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-sm md:text-base mb-1">Dusun Uttangnge</h4>
                            <p class="font-semibold text-xs md:text-sm mb-1">AMBO TUO</p>
                            <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19710701 200507 2 001</p>
                        </div>
                        
                        <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center border-2 border-emerald-500">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-sm md:text-base mb-1">Dusun Angkasa</h4>
                            <p class="font-semibold text-xs md:text-sm mb-1">YANAS. YB</p>
                            <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 1974090 200507 1 001</p>
                        </div>
                        
                        <div class="bg-gradient-to-r from-amber-600 to-amber-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center border-2 border-amber-500">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-sm md:text-base mb-1">Dusun Pusu Ute I</h4>
                            <p class="font-semibold text-xs md:text-sm mb-1">MANSUR</p>
                            <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19830406 200507 2 001</p>
                        </div>
                        
                        <div class="bg-gradient-to-r from-rose-600 to-rose-700 text-white rounded-2xl p-4 md:p-5 shadow-xl text-center border-2 border-rose-500">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border-2 border-white/30">
                                <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-sm md:text-base mb-1">Dusun Pusu Ute II</h4>
                            <p class="font-semibold text-xs md:text-sm mb-1">ALIMUDDIN</p>
                            <p class="text-xs opacity-90 bg-white/10 px-2 py-1 rounded-full break-all">NIPD: 19670817 200507 2 001</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
