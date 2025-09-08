# Panduan Deployment ke Hostinger

## 📋 Persiapan Sebelum Upload

### 1. Build Assets untuk Production
```bash
# Install dependencies
npm install

# Build untuk production
npm run build

# Install PHP dependencies
composer install --optimize-autoloader --no-dev
```

### 2. Konfigurasi Environment
Buat file `.env` di root project dengan konfigurasi berikut:

```env
APP_NAME="Desa Rakadua"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

## 🚀 Langkah-langkah Upload ke Hostinger

### 1. Upload File ke Hostinger
- Upload semua file project ke folder `public_html` di Hostinger
- Pastikan struktur folder tetap sama

### 2. Set Permissions
```bash
# Set permissions untuk storage dan cache
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### 3. Generate Application Key
```bash
php artisan key:generate
```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Clear Cache
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 🔧 Konfigurasi Hostinger

### 1. PHP Version
- Pastikan menggunakan PHP 8.1 atau lebih tinggi
- Enable extensions: `openssl`, `pdo`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`

### 2. Database
- Buat database MySQL di Hostinger
- Import struktur database jika diperlukan

### 3. Domain Configuration
- Point domain ke folder `public_html`
- Pastikan SSL certificate aktif

## ✅ Verifikasi Deployment

1. **Cek Homepage**: Akses `https://yourdomain.com` - harus menampilkan Home.vue
2. **Cek Routing**: Test semua route Vue.js
3. **Cek API**: Test endpoint `/api/products`
4. **Cek Admin**: Test login admin di `/login`

## 🐛 Troubleshooting

### Jika Homepage tidak muncul:
1. Cek file `.htaccess` di folder `public`
2. Pastikan `APP_URL` di `.env` sesuai dengan domain
3. Clear cache: `php artisan cache:clear`

### Jika Assets tidak load:
1. Pastikan folder `public/build` ada dan berisi file CSS/JS
2. Cek permission folder `public`
3. Rebuild assets: `npm run build`

### Jika Database Error:
1. Cek konfigurasi database di `.env`
2. Pastikan database user memiliki permission yang cukup
3. Run migration: `php artisan migrate`

## 📱 Mobile Responsive
Setelah deployment, test tampilan mobile di berbagai device untuk memastikan responsive design berfungsi dengan baik.
