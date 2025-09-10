@extends('layouts.admin')

@section('title', 'Kelola Produk - Desa Rakadua')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900" style="font-family: 'Inter', sans-serif">Kelola Produk</h1>
                    <p class="text-sm text-gray-600" style="font-family: 'Noto Sans', sans-serif">Manajemen produk Desa Rakadua</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900 transition-colors" style="font-family: 'Noto Sans', sans-serif">Dashboard</a>
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

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Actions Bar -->
        <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.products.create') }}" class="bg-[#0992d6] hover:bg-[#0882c0] text-white px-4 py-2 rounded-lg text-sm font-medium inline-flex items-center transition-colors duration-200" style="font-family: 'Inter', sans-serif">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Produk
                </a>
            </div>
            
            <div class="flex items-center space-x-4">
                <input type="text" id="searchInput" placeholder="Cari produk..." 
                       class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0992d6] focus:border-transparent transition-colors" style="font-family: 'Noto Sans', sans-serif">
                <select id="categoryFilter" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0992d6] focus:border-transparent transition-colors" style="font-family: 'Noto Sans', sans-serif">
                    <option value="">Semua Kategori</option>
                    <option value="makanan">Makanan</option>
                    <option value="kerajinan">Kerajinan</option>
                    <option value="pertanian">Pertanian</option>
                </select>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Inter', sans-serif">Daftar Produk</h3>
            </div>
            
            <!-- Loading State -->
            <div id="loadingState" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-[#0992d6]"></div>
                <p class="mt-4 text-gray-600" style="font-family: 'Noto Sans', sans-serif">Memuat produk...</p>
            </div>
            
            <!-- No Products State -->
            <div id="noProductsState" class="text-center py-12 hidden">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900" style="font-family: 'Inter', sans-serif">Belum Ada Produk</h3>
                <p class="mt-1 text-sm text-gray-500" style="font-family: 'Noto Sans', sans-serif">Mulai dengan menambahkan produk pertama Anda.</p>
            </div>
            
            <!-- Products Grid -->
            <div id="productsGrid" class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 hidden">
                <!-- Products will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900" style="font-family: 'Inter', sans-serif">Konfirmasi Hapus</h3>
                        <p class="text-sm text-gray-600" style="font-family: 'Noto Sans', sans-serif">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-6" style="font-family: 'Noto Sans', sans-serif">
                    Apakah Anda yakin ingin menghapus produk <span id="deleteProductName" class="font-semibold"></span>?
                </p>
                <div class="flex space-x-3">
                    <button id="cancelDelete" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200" style="font-family: 'Inter', sans-serif">
                        Batal
                    </button>
                    <button id="confirmDelete" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200" style="font-family: 'Inter', sans-serif">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Global variables
    let products = [];
    let currentDeleteId = null;

    // DOM elements
    const loadingState = document.getElementById('loadingState');
    const noProductsState = document.getElementById('noProductsState');
    const productsGrid = document.getElementById('productsGrid');
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const deleteModal = document.getElementById('deleteModal');
    const deleteProductName = document.getElementById('deleteProductName');
    const cancelDelete = document.getElementById('cancelDelete');
    const confirmDelete = document.getElementById('confirmDelete');

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        loadProducts();
        setupEventListeners();
    });

    // Load products from API
    async function loadProducts() {
        try {
            loadingState.classList.remove('hidden');
            productsGrid.classList.add('hidden');
            noProductsState.classList.add('hidden');

            const response = await fetch('/api/products');
            if (!response.ok) throw new Error('Failed to fetch products');
            
            products = await response.json();
            displayProducts(products);
        } catch (error) {
            console.error('Error loading products:', error);
            showNoProducts();
        } finally {
            loadingState.classList.add('hidden');
        }
    }

    // Display products
    function displayProducts(productsToShow) {
        if (productsToShow.length === 0) {
            showNoProducts();
            return;
        }

        productsGrid.innerHTML = '';
        productsToShow.forEach(product => {
            const productCard = createProductCard(product);
            productsGrid.appendChild(productCard);
        });

        productsGrid.classList.remove('hidden');
        noProductsState.classList.add('hidden');
    }

    // Create product card
    function createProductCard(product) {
        const card = document.createElement('div');
        card.className = 'bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300';
        
        card.innerHTML = `
            <div class="relative">
                <img src="${product.image_path}" 
                     alt="${product.name}" 
                     class="w-full h-48 object-cover"
                     onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                <div class="absolute top-2 right-2">
                    <span class="bg-[#0992d6] text-white px-2 py-1 rounded-full text-xs font-semibold">
                        ${product.category || 'Produk'}
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2" style="font-family: 'Inter', sans-serif">${product.name}</h3>
                <p class="text-gray-600 text-sm mb-3" style="font-family: 'Noto Sans', sans-serif">${product.description || 'Deskripsi tidak tersedia'}</p>
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xl font-bold text-[#0992d6]">${formatPrice(product.price)}</span>
                </div>
                <div class="flex space-x-2">
                    <a href="/admin/products/${product.id}/edit" 
                       class="flex-1 bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg text-sm font-semibold text-center transition-colors duration-200" style="font-family: 'Inter', sans-serif">
                        Edit
                    </a>
                    <button onclick="showDeleteModal(${product.id}, '${product.name}')" 
                            class="flex-1 bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-semibold transition-colors duration-200" style="font-family: 'Inter', sans-serif">
                        Hapus
                    </button>
                </div>
            </div>
        `;
        
        return card;
    }

    // Show no products state
    function showNoProducts() {
        productsGrid.classList.add('hidden');
        noProductsState.classList.remove('hidden');
    }

    // Format price
    function formatPrice(price) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(price);
    }

    // Show delete modal
    function showDeleteModal(productId, productName) {
        currentDeleteId = productId;
        deleteProductName.textContent = productName;
        deleteModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    // Hide delete modal
    function hideDeleteModal() {
        deleteModal.classList.add('hidden');
        document.body.style.overflow = '';
        currentDeleteId = null;
    }

    // Delete product
    async function deleteProduct() {
        if (!currentDeleteId) return;

        try {
            const response = await fetch(`/admin/products/${currentDeleteId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                let errorMessage = 'Gagal menghapus produk';
                try {
                    const errorData = await response.json();
                    errorMessage = errorData.message || errorData.error || errorMessage;
                } catch (e) {
                    errorMessage = response.statusText || errorMessage;
                }
                throw new Error(errorMessage);
            }

            // Remove product from local array
            products = products.filter(p => p.id !== currentDeleteId);
            displayProducts(products);
            hideDeleteModal();
            
            // Show success message
            showNotification('Produk berhasil dihapus!', 'success');
        } catch (error) {
            console.error('Error deleting product:', error);
            showNotification('Gagal menghapus produk', 'error');
        }
    }

    // Filter and search
    function filterProducts() {
        let filteredProducts = [...products];

        // Search filter
        const searchTerm = searchInput.value.toLowerCase();
        if (searchTerm) {
            filteredProducts = filteredProducts.filter(product =>
                product.name.toLowerCase().includes(searchTerm) ||
                (product.description && product.description.toLowerCase().includes(searchTerm))
            );
        }

        // Category filter
        const category = categoryFilter.value;
        if (category) {
            filteredProducts = filteredProducts.filter(product =>
                product.category && product.category.toLowerCase() === category
            );
        }

        displayProducts(filteredProducts);
    }

    // Show notification
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg text-white ${
            type === 'success' ? 'bg-green-500' : 
            type === 'error' ? 'bg-red-500' : 'bg-blue-500'
        }`;
        notification.textContent = message;
        notification.style.fontFamily = 'Noto Sans, sans-serif';
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    // Setup event listeners
    function setupEventListeners() {
        // Search and filter
        searchInput.addEventListener('input', filterProducts);
        categoryFilter.addEventListener('change', filterProducts);

        // Delete modal
        cancelDelete.addEventListener('click', hideDeleteModal);
        confirmDelete.addEventListener('click', deleteProduct);

        // Close modal on overlay click
        deleteModal.addEventListener('click', (e) => {
            if (e.target === deleteModal) hideDeleteModal();
        });

        // Close modal on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') hideDeleteModal();
        });
    }

    // Make functions global
    window.showDeleteModal = showDeleteModal;
</script>
@endsection
