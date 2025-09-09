#!/bin/bash

# Script untuk deploy ke Hostinger
# Pastikan sudah login ke server Hostinger via SSH

echo "🚀 Memulai deployment ke Hostinger..."

# 1. Backup database (opsional)
echo "📦 Membuat backup database..."
mysqldump -u [username] -p[password] [database_name] > backup_$(date +%Y%m%d_%H%M%S).sql

# 2. Pull latest code
echo "📥 Pulling latest code..."
git pull origin main

# 3. Install/Update dependencies
echo "📦 Installing dependencies..."
composer install --optimize-autoloader --no-dev

# 4. Clear caches
echo "🧹 Clearing caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Run migrations
echo "🗄️ Running migrations..."
php artisan migrate --force

# 6. Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# 7. Set permissions
echo "🔐 Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache

# 8. Clear application cache
echo "🧹 Clearing application cache..."
php artisan cache:clear

echo "✅ Deployment selesai!"
echo "🌐 Website sudah siap di: https://yourdomain.com"
echo "👤 Admin login: admin@desabungkutoko.com / admin123"
