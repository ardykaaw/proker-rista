# Panduan Deployment ke Hostinger

## Masalah yang Diperbaiki

### 1. Gambar Tidak Tampil
- **Penyebab**: Path gambar menggunakan `/images/` yang tidak bisa diakses di Hostinger
- **Solusi**: Menggunakan `{{ asset('images/...') }}` untuk path yang benar
- **Fallback**: Menambahkan `onerror` untuk menampilkan placeholder jika gambar tidak ditemukan

### 2. Error "Unexpected Token" saat Upload
- **Penyebab**: Error handling JavaScript yang tidak tepat
- **Solusi**: Memperbaiki error handling di semua form upload

### 3. Storage Symlink
- **Penyebab**: Symlink storage tidak dibuat di Hostinger
- **Solusi**: Menjalankan `php artisan storage:link` di server

## Langkah Deployment

### 1. Upload File ke Hostinger
```bash
# Upload semua file ke public_html
# Pastikan struktur folder:
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/ (isi folder public dipindah ke root)
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── .htaccess
├── artisan
├── composer.json
└── index.php
```

### 2. Konfigurasi .env
```env
APP_NAME="Desa Rakadua"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://umkmrakadua.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

FILESYSTEM_DISK=public
```

### 3. Jalankan Perintah di Hostinger
```bash
# Via File Manager atau SSH
php artisan storage:link
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 4. Set Permissions
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public
```

### 5. Upload Gambar
- Upload semua gambar ke folder `public/images/`
- Pastikan folder `storage/app/public/products/` ada
- Pastikan symlink `public/storage` mengarah ke `storage/app/public`

## File yang Diperbaiki

1. **home.blade.php** - Semua path gambar menggunakan `asset()`
2. **produk.blade.php** - Fallback gambar produk
3. **layouts/app.blade.php** - Logo dan gambar footer
4. **admin/dashboard.blade.php** - Gambar produk di dashboard
5. **admin/products/index.blade.php** - Gambar produk di admin
6. **ProductController.php** - Path gambar API
7. **Error handling** - Semua form upload

## Script Bantuan

Gunakan script `fix-images.sh` untuk memastikan setup yang benar:
```bash
chmod +x fix-images.sh
./fix-images.sh
```

## Troubleshooting

### Gambar Masih Tidak Tampil
1. Cek apakah folder `public/images/` ada
2. Cek apakah symlink `public/storage` ada
3. Cek permissions folder storage
4. Cek path di browser developer tools

### Upload Gagal
1. Cek permissions folder storage
2. Cek ukuran file (max 10MB)
3. Cek format file (jpeg, png, jpg, webp)
4. Cek error di browser console

### Database Error
1. Cek konfigurasi database di .env
2. Jalankan migration: `php artisan migrate`
3. Jalankan seeder: `php artisan db:seed`
