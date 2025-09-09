# Desa Rakadua - Laravel Version

Aplikasi website Desa Rakadua yang dibuat dengan Laravel murni (tanpa Vue.js) untuk mengatasi masalah npm di production Hostinger.

## Fitur

### Halaman Publik
- **Beranda** (`/`) - Halaman utama dengan hero section, carousel, tentang kami, berita & event, dan galeri
- **Produk Lokal** (`/produk`) - Katalog produk dengan fitur pencarian, filter, dan keranjang belanja
- **Sejarah** (`/sejarah`) - Timeline sejarah desa, nilai-nilai luhur, dan visi misi

### Halaman Admin
- **Login** (`/login`) - Halaman login admin
- **Dashboard** (`/admin/dashboard`) - Dashboard admin dengan statistik produk
- **Kelola Produk** (`/admin/products`) - CRUD produk dengan upload gambar

## Kredensial Admin

- **Email:** admin@desarakadua.com
- **Password:** admin123

## Instalasi

### 1. Clone Repository
```bash
git clone <repository-url>
cd desabungkutokov2
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
```bash
# Edit .env file untuk konfigurasi database
php artisan migrate:fresh --seed
```

### 5. Storage Link
```bash
php artisan storage:link
```

### 6. Jalankan Server
```bash
php artisan serve
```

## Struktur File

```
resources/views/
├── layouts/
│   └── app.blade.php          # Layout utama dengan navbar dan footer
├── home.blade.php             # Halaman beranda
├── produk.blade.php           # Halaman produk lokal
├── sejarah.blade.php          # Halaman sejarah
├── login.blade.php            # Halaman login admin
└── admin/
    ├── dashboard.blade.php    # Dashboard admin
    └── products/
        ├── index.blade.php    # Daftar produk admin
        ├── create.blade.php   # Tambah produk
        └── edit.blade.php     # Edit produk

app/Http/Controllers/
├── HomeController.php         # Controller halaman publik
├── AdminController.php        # Controller admin (login, dashboard)
└── AdminProductController.php # Controller manajemen produk

routes/web.php                 # Semua routes aplikasi
```

## API Endpoints

### Produk
- `GET /api/products` - Daftar semua produk
- `POST /api/products` - Tambah produk baru
- `PUT /api/products/{id}` - Update produk
- `DELETE /api/products/{id}` - Hapus produk

## Deployment ke Hostinger

### 1. Upload Files
Upload semua file ke folder public_html di Hostinger.

### 2. Database
- Buat database MySQL di Hostinger
- Update konfigurasi database di `.env`
- Jalankan migrasi: `php artisan migrate:fresh --seed`

### 3. Storage
```bash
php artisan storage:link
```

### 4. Permissions
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### 5. .htaccess
Pastikan file `.htaccess` di folder public sudah benar untuk Laravel.

## Fitur Utama

### Responsive Design
- Mobile-first approach
- Tailwind CSS untuk styling
- Burger menu untuk mobile
- Touch-friendly interface

### Produk Management
- Upload gambar produk
- Kategori produk (makanan, kerajinan, pertanian)
- Pencarian dan filter
- Keranjang belanja dengan WhatsApp integration

### Admin Panel
- Dashboard dengan statistik
- CRUD produk lengkap
- Upload dan hapus gambar
- Responsive admin interface

## Teknologi

- **Backend:** Laravel 11
- **Frontend:** Blade Templates + Tailwind CSS
- **Database:** MySQL
- **Storage:** Laravel Storage
- **Authentication:** Laravel Auth

## Keunggulan vs Vue.js Version

1. **Tidak memerlukan npm build** - Langsung bisa di-deploy
2. **Server-side rendering** - SEO friendly
3. **Lebih stabil** - Tidak ada masalah JavaScript di production
4. **Mudah maintenance** - Standard Laravel development
5. **Kompatibel dengan semua hosting** - Tidak perlu Node.js

## Troubleshooting

### Storage Link Error
```bash
rm public/storage
php artisan storage:link
```

### Permission Error
```bash
chmod -R 755 storage bootstrap/cache
```

### Database Error
```bash
php artisan migrate:fresh --seed
```

## Support

Untuk pertanyaan atau bantuan, silakan hubungi tim development.
