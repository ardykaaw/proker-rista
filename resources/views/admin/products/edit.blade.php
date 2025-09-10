@extends('layouts.admin')

@section('title', 'Edit Produk - Desa Rakadua')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Edit Produk</h1>
                    <p class="text-sm text-gray-600">Ubah informasi produk</p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900">Kembali</a>
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
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
                @method('PUT')
                
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk *</label>
                    <input type="text" id="name" name="name" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-300 @enderror"
                           value="{{ old('name', $product->name ?? '') }}" placeholder="Masukkan nama produk">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi *</label>
                    <textarea id="description" name="description" rows="4" required
                              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('description') border-red-300 @enderror"
                              placeholder="Masukkan deskripsi produk">{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price and Stock -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga (Rp) *</label>
                        <input type="number" id="price" name="price" required min="0"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('price') border-red-300 @enderror"
                               value="{{ old('price', $product->price ?? '') }}" placeholder="0">
                        @error('price')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stok *</label>
                        <input type="number" id="stock" name="stock" required min="0"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('stock') border-red-300 @enderror"
                               value="{{ old('stock', $product->stock ?? '') }}" placeholder="0">
                        @error('stock')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori *</label>
                    <select id="category" name="category" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('category') border-red-300 @enderror">
                        <option value="">Pilih kategori</option>
                        <option value="makanan" {{ old('category', $product->category ?? '') == 'makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="kerajinan" {{ old('category', $product->category ?? '') == 'kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                        <option value="pertanian" {{ old('category', $product->category ?? '') == 'pertanian' ? 'selected' : '' }}>Pertanian</option>
                    </select>
                    @error('category')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if(isset($product) && $product->image_path)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                    <div class="flex items-center space-x-4">
                        <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="h-24 w-24 object-cover rounded-lg">
                        <div>
                            <p class="text-sm text-gray-600">Gambar saat ini</p>
                            <button type="button" onclick="removeCurrentImage()" class="text-red-600 hover:text-red-800 text-sm">
                                Hapus gambar
                            </button>
                        </div>
                    </div>
                    <input type="hidden" id="removeImage" name="remove_image" value="0">
                </div>
                @endif

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">
                        {{ isset($product) && $product->image_path ? 'Ganti Gambar' : 'Gambar Produk' }}
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition-colors duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload gambar</span>
                                    <input id="image" name="image" type="file" accept="image/*" class="sr-only" onchange="previewImage(this)">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, WEBP hingga 10MB</p>
                        </div>
                    </div>
                    <div id="imagePreview" class="mt-4 hidden">
                        <img id="previewImg" src="" alt="Preview" class="h-32 w-32 object-cover rounded-lg mx-auto">
                    </div>
                    @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone (WhatsApp) -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor WhatsApp *</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">+62</span>
                        <input type="tel" id="phone" name="phone" required
                               class="mt-1 block w-full pl-12 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('phone') border-red-300 @enderror"
                               value="{{ old('phone', $product->phone ?? '') }}" placeholder="81234567890">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Masukkan nomor WhatsApp tanpa kode negara (+62)</p>
                    @error('phone')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.products.index') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-6 rounded-lg font-medium transition-colors duration-200">
                        Batal
                    </a>
                    <button type="submit" id="submitBtn"
                            class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg font-medium transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span id="submitText">Update Produk</span>
                        <span id="submitLoading" class="hidden">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Menyimpan...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Preview image
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // Remove current image
    function removeCurrentImage() {
        if (confirm('Apakah Anda yakin ingin menghapus gambar saat ini?')) {
            document.getElementById('removeImage').value = '1';
            // Hide current image section
            const currentImageSection = document.querySelector('img[src*="{{ $product->image_path ?? "" }}"]').closest('div').parentElement;
            currentImageSection.style.display = 'none';
        }
    }
    
    // Format price input
    document.getElementById('price').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        e.target.value = value;
    });
    
    // Form submission
    document.getElementById('productForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const submitLoading = document.getElementById('submitLoading');
        
        // Show loading state
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        submitLoading.classList.remove('hidden');
        
        try {
            const formData = new FormData(this);
            
            const response = await fetch('/admin/products/{{ $product->id ?? "" }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-HTTP-Method-Override': 'PUT'
                }
            });
            
            if (!response.ok) {
                let errorMessage = 'Gagal mengupdate produk';
                try {
                    const errorData = await response.json();
                    errorMessage = errorData.message || errorData.error || errorMessage;
                } catch (e) {
                    // If response is not JSON, use status text
                    errorMessage = response.statusText || errorMessage;
                }
                throw new Error(errorMessage);
            }
            
            const result = await response.json();
            
            // Show success message
            showNotification('Produk berhasil diupdate!', 'success');
            
            // Redirect to products list
            setTimeout(() => {
                window.location.href = '/admin/products';
            }, 1500);
            
        } catch (error) {
            console.error('Error updating product:', error);
            showNotification('Gagal mengupdate produk: ' + error.message, 'error');
        } finally {
            // Hide loading state
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            submitLoading.classList.add('hidden');
        }
    });
    
    // Show notification
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-20 right-4 px-4 py-2 rounded-lg shadow-lg z-50 ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 5000);
    }
</script>
@endsection
