#!/bin/bash

echo "Setting up Laravel project for Hostinger..."

# Set proper permissions
echo "Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public

# Create storage symlink
echo "Creating storage symlink..."
php artisan storage:link

# Clear all caches
echo "Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
echo "Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions for storage
echo "Setting storage permissions..."
chmod -R 775 storage
chmod -R 775 bootstrap/cache

echo "Setup completed!"
echo "Make sure to:"
echo "1. Set APP_URL in .env to your domain"
echo "2. Set FILESYSTEM_DISK=public in .env"
echo "3. Check that storage/app/public directory exists"
echo "4. Verify that public/storage symlink exists"
