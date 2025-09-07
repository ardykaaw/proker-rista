<template>
    <div class="min-h-screen bg-gray-50 flex">
        <Sidebar />

        <div class="flex-1 ml-64">
            <nav class="bg-white/90 backdrop-blur shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16 items-center">
                        <h1 class="text-xl font-bold">Kelola Produk UMKM</h1>
                        <button @click="openCreate" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">Tambah Produk</button>
                    </div>
                </div>
            </nav>

            <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
                <div class="px-4 sm:px-0">
                    <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                                        <th class="px-4 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr v-for="product in products" :key="product.id" class="hover:bg-gray-50">
                                        <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ product.name }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ product.category || '-' }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">Rp {{ (product.price || 0).toLocaleString() }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ product.stock }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">
                                            <img v-if="product.image_path" :src="product.image_path" alt="" class="h-10 w-10 object-cover rounded" />
                                            <span v-else class="text-gray-400 text-xs">Tidak ada</span>
                                        </td>
                                        <td class="px-4 py-3 text-right whitespace-nowrap">
                                            <button @click="openEdit(product)" class="px-3 py-1.5 text-xs bg-yellow-500 text-white rounded mr-2 hover:bg-yellow-600">Edit</button>
                                            <button @click="confirmDelete(product)" class="px-3 py-1.5 text-xs bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Modal Form -->
        <div v-if="showForm" class="fixed inset-0 z-50 flex items-center justify-center">
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
            <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b">
                    <h3 class="text-lg font-semibold">{{ form.id ? 'Edit Produk' : 'Tambah Produk' }}</h3>
                    <button @click="closeModal" class="text-gray-500 hover:text-gray-700">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form @submit.prevent="save">
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama</label>
                                <input v-model.trim="form.name" type="text" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" required />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea v-model.trim="form.description" rows="4" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                                    <input v-model.number="form.price" type="number" min="0" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Stok</label>
                                    <input v-model.number="form.stock" type="number" min="0" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" required />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <input v-model.trim="form.category" type="text" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                                    <input @change="onFileChange" type="file" accept="image/*" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp (contoh: 628123456789)</label>
                                <input v-model.trim="form.phone" type="tel" placeholder="628xxxxxxxxx" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" />
                            </div>
                            <p v-if="errorMessage" class="text-sm text-red-600">{{ errorMessage }}</p>
                            <p v-if="successMessage" class="text-sm text-green-600">{{ successMessage }}</p>
                        </div>
                        <div class="md:col-span-1">
                            <div class="border rounded-lg overflow-hidden bg-gray-50 flex items-center justify-center aspect-[4/3]">
                                <img v-if="imagePreview || form.image_path" :src="imagePreview || form.image_path" class="object-cover w-full h-full" />
                                <div v-else class="text-center text-gray-400 text-sm">Preview Gambar</div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t flex justify-end gap-3 bg-gray-50">
                        <button type="button" @click="closeModal" class="px-4 py-2 rounded border">Batal</button>
                        <button type="submit" :disabled="saving" class="px-4 py-2 rounded bg-blue-600 text-white disabled:opacity-60 flex items-center gap-2">
                            <span v-if="saving" class="inline-block h-4 w-4 border-2 border-white/60 border-t-transparent rounded-full animate-spin"></span>
                            <span>{{ saving ? 'Menyimpan...' : 'Simpan' }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from './Sidebar.vue'

export default {
    components: { Sidebar },
    data() {
        return {
            products: [],
            showForm: false,
            form: { id: null, name: '', description: '', price: 0, stock: 0, category: '', image_path: '', phone: '' },
            file: null,
            deleting: null,
            saving: false,
            errorMessage: '',
            successMessage: '',
            imagePreview: null,
        }
    },
    created() {
        if (!localStorage.getItem('isAdminLoggedIn')) {
            this.$router.push('/login')
            return
        }
        this.fetchProducts()
    },
    methods: {
        async fetchProducts() {
            const { data } = await window.axios.get('/api/products')
            this.products = data
        },
        openCreate() {
            this.form = { id: null, name: '', description: '', price: 0, stock: 0, category: '', image_path: '', phone: '' }
            this.showForm = true
        },
        openEdit(product) {
            this.form = { ...product }
            this.showForm = true
        },
        async save() {
            try {
                this.saving = true
                this.errorMessage = ''
                this.successMessage = ''

                const formData = new FormData()
                Object.keys(this.form).forEach(k => {
                    if (this.form[k] !== null && this.form[k] !== undefined) {
                        formData.append(k, this.form[k])
                    }
                })
                if (this.file) formData.append('image', this.file)

                if (this.form.id) {
                    // gunakan POST agar tidak masalah dengan method override saat multipart
                    await window.axios.post(`/api/products/${this.form.id}?_method=PUT`, formData)
                    this.successMessage = 'Produk berhasil diperbarui'
                } else {
                    await window.axios.post('/api/products', formData)
                    this.successMessage = 'Produk berhasil dibuat'
                }
                await this.fetchProducts()
                setTimeout(() => this.closeModal(), 600)
            } catch (e) {
                this.errorMessage = e?.response?.data?.message || 'Gagal menyimpan produk'
            } finally {
                this.saving = false
            }
        },
        onFileChange(e) {
            const files = e.target.files
            this.file = files && files[0] ? files[0] : null
            if (this.file) {
                this.imagePreview = URL.createObjectURL(this.file)
            }
        },
        closeModal() {
            this.showForm = false
            this.file = null
            this.imagePreview = null
            this.successMessage = ''
            this.errorMessage = ''
        },
        async confirmDelete(product) {
            if (confirm(`Hapus produk \"${product.name}\"?`)) {
                await window.axios.delete(`/api/products/${product.id}`)
                await this.fetchProducts()
            }
        }
    }
}
</script>


