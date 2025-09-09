# Panduan Deployment Desa Rakadua ke Hostinger

## Persiapan

### 1. File yang Perlu Diupload
```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── .htaccess
├── artisan
├── composer.json
├── composer.lock
└── public/
    ├── .htaccess
    ├── index.php
    └── storage/ (symlink)
```

### 2. Database Setup
1. Buat database MySQL di Hostinger
2. Buat user database dengan privileges penuh
3. Update konfigurasi database di `.env`

## Langkah-langkah Deployment

### 1. Upload Files
```bash
# Upload semua file ke public_html
# Pastikan struktur folder tetap sama
```

### 2. Konfigurasi Environment
```bash
# Copy env.production.example ke .env
cp env.production.example .env

# Edit .env dengan konfigurasi yang benar
nano .env
```

### 3. Generate App Key
```bash
php artisan key:generate
```

### 4. Database Migration
```bash
php artisan migrate:fresh --seed
```

### 5. Storage Link
```bash
php artisan storage:link
```

### 6. Set Permissions
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

### 7. Clear Caches
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan cache:clear
```

## Konfigurasi .env untuk Production

```env
APP_NAME="Desa Bungkutoko"
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

CACHE_DRIVER=file
SESSION_DRIVER=file
```

## Testing Setelah Deployment

### 1. Test Halaman Publik
- [ ] Beranda: `https://yourdomain.com`
- [ ] Produk: `https://yourdomain.com/produk`
- [ ] Sejarah: `https://yourdomain.com/sejarah`

### 2. Test Admin Panel
- [ ] Login: `https://yourdomain.com/login`
- [ ] Dashboard: `https://yourdomain.com/admin/dashboard`
- [ ] Kelola Produk: `https://yourdomain.com/admin/products`

### 3. Test API
- [ ] API Produk: `https://yourdomain.com/api/products`

## Troubleshooting

### Error 500
```bash
# Check logs
tail -f storage/logs/laravel.log

# Check permissions
ls -la storage/
ls -la bootstrap/cache/
```

### Storage Link Error
```bash
# Remove existing link
rm public/storage

# Create new link
php artisan storage:link
```

### Database Connection Error
```bash
# Test database connection
php artisan tinker
>>> DB::connection()->getPdo();
```

### Permission Error
```bash
# Fix permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## Keunggulan Laravel Version

1. **Tidak Perlu npm** - Langsung bisa di-deploy
2. **Server-side Rendering** - SEO friendly
3. **Stabil** - Tidak ada masalah JavaScript
4. **Mudah Maintenance** - Standard Laravel
5. **Kompatibel** - Bekerja di semua hosting

## Fitur yang Tersedia

### Halaman Publik
- ✅ Beranda dengan carousel dan galeri
- ✅ Produk lokal dengan pencarian dan filter
- ✅ Sejarah desa dengan timeline
- ✅ Responsive design untuk mobile

### Admin Panel
- ✅ Login admin
- ✅ Dashboard dengan statistik
- ✅ CRUD produk lengkap
- ✅ Upload dan hapus gambar
- ✅ Responsive admin interface

### API
- ✅ REST API untuk produk
- ✅ CORS support
- ✅ JSON responses

## Kredensial Default

- **Email:** admin@desarakadua.com
- **Password:** admin123

## Support

Jika ada masalah, periksa:
1. Log file di `storage/logs/laravel.log`
2. Permission folder storage dan bootstrap/cache
3. Konfigurasi database di `.env`
4. Storage link sudah dibuat

## Update Aplikasi

```bash
# Pull latest code
git pull origin main

# Update dependencies
composer install --optimize-autoloader --no-dev

# Clear caches
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan cache:clear
```
