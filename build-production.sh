#!/bin/bash

echo "🚀 Building project for production..."

# Install dependencies
echo "📦 Installing dependencies..."
npm install
composer install --optimize-autoloader --no-dev

# Build assets
echo "🔨 Building assets..."
npm run build

# Clear Laravel caches
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Optimize for production
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions
echo "🔐 Setting permissions..."
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
chmod -R 755 public/

echo "✅ Build completed successfully!"
echo "📁 Upload the entire project folder to Hostinger"
echo "🌐 Make sure to set the correct APP_URL in .env file"
