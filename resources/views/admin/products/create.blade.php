@extends('layouts.admin')

@section('title', 'Tambah Produk - Desa Rakadua')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900" style="font-family: 'Inter', sans-serif">Tambah Produk Baru</h1>
                    <p class="text-sm text-gray-600" style="font-family: 'Noto Sans', sans-serif">Tambahkan produk baru ke katalog Desa Rakadua</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors" style="font-family: 'Noto Sans', sans-serif">Kembali</a>
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900 transition-colors" style="font-family: 'Noto Sans', sans-serif">Dashboard</a>
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
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow rounded-lg">
            <form id="productForm" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Inter', sans-serif">Nama Produk *</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0992d6] focus:border-transparent transition-colors @error('name') border-red-300 @enderror"
                           value="{{ old('name') }}" placeholder="Masukkan nama produk" style="font-family: 'Noto Sans', sans-serif">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600" style="font-family: 'Noto Sans', sans-serif">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Inter', sans-serif">Deskripsi *</label>
                    <textarea id="description" name="description" rows="4" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0992d6] focus:border-transparent transition-colors @error('description') border-red-300 @enderror"
                              placeholder="Masukkan deskripsi produk" style="font-family: 'Noto Sans', sans-serif">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600" style="font-family: 'Noto Sans', sans-serif">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price and Category -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Inter', sans-serif">Harga *</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500" style="font-family: 'Noto Sans', sans-serif">Rp</span>
                            <input type="number" id="price" name="price" required min="0" step="100"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0992d6] focus:border-transparent transition-colors @error('price') border-red-300 @enderror"
                                   value="{{ old('price') }}" placeholder="0" style="font-family: 'Noto Sans', sans-serif">
                        </div>
                        @error('price')
                            <p class="mt-2 text-sm text-red-600" style="font-family: 'Noto Sans', sans-serif">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Inter', sans-serif">Kategori *</label>
                        <select id="category" name="category" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0992d6] focus:border-transparent transition-colors @error('category') border-red-300 @enderror" style="font-family: 'Noto Sans', sans-serif">
                            <option value="">Pilih Kategori</option>
                            <option value="makanan" {{ old('category') == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="kerajinan" {{ old('category') == 'kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                            <option value="pertanian" {{ old('category') == 'pertanian' ? 'selected' : '' }}>Pertanian</option>
                            <option value="lainnya" {{ old('category') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                            <p class="mt-2 text-sm text-red-600" style="font-family: 'Noto Sans', sans-serif">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Inter', sans-serif">Stok *</label>
                    <input type="number" id="stock" name="stock" required min="0"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0992d6] focus:border-transparent transition-colors @error('stock') border-red-300 @enderror"
                           value="{{ old('stock', 0) }}" placeholder="0" style="font-family: 'Noto Sans', sans-serif">
                    @error('stock')
                        <p class="mt-2 text-sm text-red-600" style="font-family: 'Noto Sans', sans-serif">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone (WhatsApp) -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Inter', sans-serif">Nomor WhatsApp *</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500" style="font-family: 'Noto Sans', sans-serif">+62</span>
                        <input type="tel" id="phone" name="phone" required
                               class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0992d6] focus:border-transparent transition-colors @error('phone') border-red-300 @enderror"
                               value="{{ old('phone') }}" placeholder="81234567890" style="font-family: 'Noto Sans', sans-serif">
                    </div>
                    <p class="mt-1 text-xs text-gray-500" style="font-family: 'Noto Sans', sans-serif">Masukkan nomor WhatsApp tanpa kode negara (+62)</p>
                    @error('phone')
                        <p class="mt-2 text-sm text-red-600" style="font-family: 'Noto Sans', sans-serif">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'Inter', sans-serif">Gambar Produk *</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-[#0992d6] transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-[#0992d6] hover:text-[#0882c0] focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-[#0992d6]">
                                    <span style="font-family: 'Inter', sans-serif">Upload gambar</span>
                                    <input id="image" name="image" type="file" accept="image/*" required class="sr-only" onchange="previewImage(this)">
                                </label>
                                <p class="pl-1" style="font-family: 'Noto Sans', sans-serif">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500" style="font-family: 'Noto Sans', sans-serif">PNG, JPG, GIF hingga 10MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-2 text-sm text-red-600" style="font-family: 'Noto Sans', sans-serif">{{ $message }}</p>
                    @enderror
                    
                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-4 hidden">
                        <img id="previewImg" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.products.index') }}" 
                       class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200" style="font-family: 'Inter', sans-serif">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-[#0992d6] text-white rounded-lg hover:bg-[#0882c0] transition-colors duration-200 font-semibold" style="font-family: 'Inter', sans-serif">
                        <span id="submitText">Simpan Produk</span>
                        <span id="loadingText" class="hidden">Menyimpan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Preview image function
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                const previewImg = document.getElementById('previewImg');
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Form submission
    document.getElementById('productForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = document.querySelector('button[type="submit"]');
        const submitText = document.getElementById('submitText');
        const loadingText = document.getElementById('loadingText');
        
        // Show loading state
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        loadingText.classList.remove('hidden');
        
        try {
            const formData = new FormData(this);
            
            const response = await fetch('/admin/products', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            if (!response.ok) {
                let errorMessage = 'Gagal menyimpan produk';
                try {
                    const errorData = await response.json();
                    errorMessage = errorData.message || errorData.error || errorMessage;
                } catch (e) {
                    // If response is not JSON, use status text
                    errorMessage = response.statusText || errorMessage;
                }
                throw new Error(errorMessage);
            }
            
            // Show success message
            showNotification('Produk berhasil disimpan!', 'success');
            
            // Redirect to products list
            setTimeout(() => {
                window.location.href = '/admin/products';
            }, 1500);
            
        } catch (error) {
            console.error('Error saving product:', error);
            showNotification(error.message || 'Gagal menyimpan produk', 'error');
        } finally {
            // Hide loading state
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            loadingText.classList.add('hidden');
        }
    });

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

    // Format price input
    document.getElementById('price').addEventListener('input', function(e) {
        let value = e.target.value;
        if (value < 0) e.target.value = 0;
    });

    // Format stock input
    document.getElementById('stock').addEventListener('input', function(e) {
        let value = e.target.value;
        if (value < 0) e.target.value = 0;
    });
</script>
@endsection