@extends('layouts.admin')

@section('title', 'Dashboard Admin - Desa Rakadua')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900" style="font-family: 'Inter', sans-serif">Dashboard Admin</h1>
                    <p class="text-sm text-gray-600" style="font-family: 'Noto Sans', sans-serif">Selamat datang, {{ auth()->user()->name ?? 'Admin' }} - Desa Rakadua</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('produk') }}" class="text-gray-600 hover:text-gray-900 transition-colors" style="font-family: 'Noto Sans', sans-serif">Lihat Website</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200" style="font-family: 'Inter', sans-serif">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Products -->
            <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-xl transition-shadow duration-300">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-[#0992d6] rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate" style="font-family: 'Noto Sans', sans-serif">Total Produk</dt>
                                <dd class="text-2xl font-bold text-gray-900" id="totalProducts" style="font-family: 'Inter', sans-serif">-</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Categories -->
            <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-xl transition-shadow duration-300">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate" style="font-family: 'Noto Sans', sans-serif">Kategori</dt>
                                <dd class="text-2xl font-bold text-gray-900" id="totalCategories" style="font-family: 'Inter', sans-serif">-</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-xl transition-shadow duration-300">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-yellow-500 rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate" style="font-family: 'Noto Sans', sans-serif">Total Pesanan</dt>
                                <dd class="text-2xl font-bold text-gray-900" id="totalOrders" style="font-family: 'Inter', sans-serif">-</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue -->
            <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-xl transition-shadow duration-300">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate" style="font-family: 'Noto Sans', sans-serif">Pendapatan</dt>
                                <dd class="text-2xl font-bold text-gray-900" id="totalRevenue" style="font-family: 'Inter', sans-serif">-</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow rounded-lg mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Inter', sans-serif">Aksi Cepat</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('admin.products.create') }}" class="flex items-center p-4 bg-[#0992d6] text-white rounded-lg hover:bg-[#0882c0] transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span style="font-family: 'Inter', sans-serif">Tambah Produk</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center p-4 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span style="font-family: 'Inter', sans-serif">Kelola Produk</span>
                    </a>
                    <a href="{{ route('produk') }}" class="flex items-center p-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span style="font-family: 'Inter', sans-serif">Lihat Website</span>
                    </a>
                    <a href="#" class="flex items-center p-4 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span style="font-family: 'Inter', sans-serif">Laporan</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Inter', sans-serif">Produk Terbaru</h3>
                    <a href="{{ route('admin.products.index') }}" class="text-[#0992d6] hover:text-[#0882c0] text-sm font-medium transition-colors" style="font-family: 'Noto Sans', sans-serif">Lihat Semua</a>
                </div>
            </div>
            <div class="p-6">
                <div id="recentProducts" class="space-y-4">
                    <!-- Recent products will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Load dashboard data
    async function loadDashboardData() {
        try {
            // Load products
            const productsResponse = await fetch('/api/products');
            const products = await productsResponse.json();
            
            // Update stats
            document.getElementById('totalProducts').textContent = products.length;
            
            // Count categories
            const categories = [...new Set(products.map(p => p.category).filter(Boolean))];
            document.getElementById('totalCategories').textContent = categories.length;
            
            // Mock data for orders and revenue
            document.getElementById('totalOrders').textContent = '0';
            document.getElementById('totalRevenue').textContent = 'Rp 0';
            
            // Load recent products
            loadRecentProducts(products.slice(0, 5));
            
        } catch (error) {
            console.error('Error loading dashboard data:', error);
        }
    }

    // Load recent products
    function loadRecentProducts(products) {
        const container = document.getElementById('recentProducts');
        
        if (products.length === 0) {
            container.innerHTML = `
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <p class="mt-2 text-gray-500" style="font-family: 'Noto Sans', sans-serif">Belum ada produk</p>
                </div>
            `;
            return;
        }

        container.innerHTML = products.map(product => `
            <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <img src="${product.image_path}" 
                     alt="${product.name}" 
                     class="w-12 h-12 object-cover rounded-lg"
                     onerror="this.src='/storage/products/EOP36Fy1A2koY60D7zra3aNg8Ha6ILI10iXZeRkh.jpg'">
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-900" style="font-family: 'Inter', sans-serif">${product.name}</h4>
                    <p class="text-sm text-gray-600" style="font-family: 'Noto Sans', sans-serif">${formatPrice(product.price)}</p>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        ${product.category || 'Produk'}
                    </span>
                </div>
            </div>
        `).join('');
    }

    // Format price
    function formatPrice(price) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(price);
    }

    // Initialize dashboard
    document.addEventListener('DOMContentLoaded', function() {
        loadDashboardData();
    });
</script>
@endsection