@extends('layouts.app')

@section('title', 'Produk Lokal - Desa Rakadua')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Produk Lokal Berkualitas</h1>
        <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto">
            Temukan berbagai produk lokal berkualitas tinggi hasil karya masyarakat Desa Rakadua
        </p>
    </div>
</section>

<!-- Filter dan Search Section -->
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
            <!-- Search -->
            <div class="w-full lg:w-1/3">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Cari produk..." 
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            
            <!-- Filter -->
            <div class="flex flex-wrap gap-4 items-center">
                <select id="categoryFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    <option value="makanan">Makanan</option>
                    <option value="kerajinan">Kerajinan</option>
                    <option value="pertanian">Pertanian</option>
                </select>
                
                <select id="sortFilter" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="newest">Terbaru</option>
                    <option value="price-low">Harga Terendah</option>
                    <option value="price-high">Harga Tertinggi</option>
                    <option value="name">Nama A-Z</option>
                </select>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Loading State -->
        <div id="loadingState" class="text-center py-12">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
            <p class="mt-4 text-gray-600">Memuat produk...</p>
        </div>
        
        <!-- No Products State -->
        <div id="noProductsState" class="text-center py-12 hidden">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum Ada Produk</h3>
            <p class="mt-1 text-sm text-gray-500">Produk akan segera ditambahkan.</p>
        </div>
        
        <!-- Products Grid -->
        <div id="productsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 hidden">
            <!-- Products will be loaded here -->
        </div>
    </div>
</section>


<!-- Product Detail Modal -->
<div id="productModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <div class="p-6 border-b">
                <div class="flex items-center justify-between">
                    <h3 id="modalProductName" class="text-lg font-semibold text-gray-800">Detail Produk</h3>
                    <button id="closeProductModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <img id="modalProductImage" src="" alt="" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div>
                        <h4 id="modalProductTitle" class="text-xl font-semibold text-gray-800 mb-2"></h4>
                        <p id="modalProductPrice" class="text-2xl font-bold text-blue-600 mb-4"></p>
                        <p id="modalProductDescription" class="text-gray-600 mb-4"></p>
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="flex items-center space-x-2">
                                <label class="text-sm font-medium text-gray-700">Jumlah:</label>
                                <div class="flex items-center border border-gray-300 rounded-lg">
                                    <button id="decreaseQty" class="px-3 py-2 hover:bg-gray-100">-</button>
                                    <input id="productQty" type="number" value="1" min="1" class="w-16 text-center border-0 focus:ring-0">
                                    <button id="increaseQty" class="px-3 py-2 hover:bg-gray-100">+</button>
                                </div>
                            </div>
                        </div>
                        <button id="buyNowBtn" class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-lg font-semibold transition-colors duration-200">
                            <i class="fab fa-whatsapp mr-2"></i>
                            Beli via WhatsApp
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .hero-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        transform: translateY(-1px);
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection

@section('scripts')
<script>
    let products = [];
    let currentProduct = null;
    
    // Load products from API
    async function loadProducts() {
        try {
            const response = await fetch('/api/products');
            if (!response.ok) {
                let errorMessage = 'Gagal memuat produk';
                try {
                    const errorData = await response.json();
                    errorMessage = errorData.message || errorData.error || errorMessage;
                } catch (e) {
                    errorMessage = response.statusText || errorMessage;
                }
                throw new Error(errorMessage);
            }
            products = await response.json();
            displayProducts(products);
        } catch (error) {
            console.error('Error loading products:', error);
            showNoProductsState();
        }
    }
    
    // Display products
    function displayProducts(productsToShow) {
        const productsGrid = document.getElementById('productsGrid');
        const loadingState = document.getElementById('loadingState');
        const noProductsState = document.getElementById('noProductsState');
        
        loadingState.classList.add('hidden');
        
        if (productsToShow.length === 0) {
            noProductsState.classList.remove('hidden');
            return;
        }
        
        noProductsState.classList.add('hidden');
        productsGrid.classList.remove('hidden');
        
        productsGrid.innerHTML = productsToShow.map(product => `
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="relative">
                    <img src="${product.image_path}" 
                         alt="${product.name}" 
                         class="w-full h-48 object-cover"
                         onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                    <div class="absolute top-4 right-4 bg-white bg-opacity-90 px-2 py-1 rounded-full text-sm font-semibold text-gray-800">
                        ${product.category || 'Produk'}
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">${product.name}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">${product.description || 'Deskripsi tidak tersedia'}</p>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xl font-bold text-blue-600">${formatPrice(product.price)}</span>
                        <span class="text-sm text-gray-500">Stok: ${product.stock || 0}</span>
                    </div>
                    <div class="flex space-x-2">
                        <button onclick="viewProduct(${product.id})" 
                                class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 px-4 rounded-lg font-medium transition-colors duration-200">
                            Lihat Detail
                        </button>
                        <button onclick="buyProduct(${product.id})" 
                                class="flex-1 bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg font-medium transition-colors duration-200">
                            <i class="fab fa-whatsapp mr-1"></i>
                            Beli
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
    }
    
    // View product detail
    function viewProduct(productId) {
        currentProduct = products.find(p => p.id === productId);
        if (!currentProduct) return;
        
        document.getElementById('modalProductName').textContent = currentProduct.name;
        document.getElementById('modalProductTitle').textContent = currentProduct.name;
        document.getElementById('modalProductPrice').textContent = formatPrice(currentProduct.price);
        document.getElementById('modalProductDescription').textContent = currentProduct.description || 'Deskripsi tidak tersedia';
        document.getElementById('modalProductImage').src = currentProduct.image_path;
        document.getElementById('productQty').value = 1;
        
        document.getElementById('productModal').classList.remove('hidden');
    }
    
    // Buy product directly via WhatsApp
    function buyProduct(productId, quantity = 1) {
        const product = products.find(p => p.id === productId);
        if (!product) return;
        
        const phoneNumber = product.phone || '6281234567890'; // Default phone number if not provided
        const message = `Halo, saya tertarik dengan produk:\n\n*${product.name}*\nHarga: ${formatPrice(product.price)}\nJumlah: ${quantity}\nTotal: ${formatPrice(product.price * quantity)}\n\nApakah produk ini masih tersedia?`;
        
        const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(whatsappUrl, '_blank');
    }
    
    // Format price
    function formatPrice(price) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(price);
    }
    
    // Filter and search
    function filterProducts() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const categoryFilter = document.getElementById('categoryFilter').value;
        const sortFilter = document.getElementById('sortFilter').value;
        
        let filteredProducts = products.filter(product => {
            const matchesSearch = product.name.toLowerCase().includes(searchTerm) ||
                                (product.description && product.description.toLowerCase().includes(searchTerm));
            const matchesCategory = !categoryFilter || product.category === categoryFilter;
            return matchesSearch && matchesCategory;
        });
        
        // Sort products
        switch (sortFilter) {
            case 'price-low':
                filteredProducts.sort((a, b) => a.price - b.price);
                break;
            case 'price-high':
                filteredProducts.sort((a, b) => b.price - a.price);
                break;
            case 'name':
                filteredProducts.sort((a, b) => a.name.localeCompare(b.name));
                break;
            case 'newest':
            default:
                filteredProducts.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                break;
        }
        
        displayProducts(filteredProducts);
    }
    
    // Show no products state
    function showNoProductsState() {
        document.getElementById('loadingState').classList.add('hidden');
        document.getElementById('productsGrid').classList.add('hidden');
        document.getElementById('noProductsState').classList.remove('hidden');
    }
    
    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        loadProducts();
        
        // Filter and search
        document.getElementById('searchInput').addEventListener('input', filterProducts);
        document.getElementById('categoryFilter').addEventListener('change', filterProducts);
        document.getElementById('sortFilter').addEventListener('change', filterProducts);
        
        // Modal controls
        document.getElementById('closeProductModal').addEventListener('click', function() {
            document.getElementById('productModal').classList.add('hidden');
        });
        
        // Product modal
        document.getElementById('buyNowBtn').addEventListener('click', function() {
            if (!currentProduct) return;
            
            const quantity = parseInt(document.getElementById('productQty').value);
            buyProduct(currentProduct.id, quantity);
            document.getElementById('productModal').classList.add('hidden');
        });
        
        // Quantity controls
        document.getElementById('decreaseQty').addEventListener('click', function() {
            const qtyInput = document.getElementById('productQty');
            const currentQty = parseInt(qtyInput.value);
            if (currentQty > 1) {
                qtyInput.value = currentQty - 1;
            }
        });
        
        document.getElementById('increaseQty').addEventListener('click', function() {
            const qtyInput = document.getElementById('productQty');
            const currentQty = parseInt(qtyInput.value);
            qtyInput.value = currentQty + 1;
    });
        
        // Close modals when clicking outside
        document.getElementById('productModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    });
</script>
@endsection
