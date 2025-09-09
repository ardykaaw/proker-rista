#!/bin/bash

echo "🔧 Fixing production image issues..."

# 1. Create storage symlink
echo "Creating storage symlink..."
php artisan storage:link

# 2. Set proper permissions
echo "Setting permissions..."
chmod -R 755 storage
chmod -R 755 public
chmod -R 755 bootstrap/cache

# 3. Copy storage files to public if symlink fails
echo "Backup: Copying storage files to public..."
if [ ! -L "public/storage" ]; then
    echo "Symlink failed, copying files directly..."
    cp -r storage/app/public/* public/storage/ 2>/dev/null || true
fi

# 4. Create missing directories
echo "Creating missing directories..."
mkdir -p public/storage/products
mkdir -p public/images/herosection
mkdir -p public/images/berita
mkdir -p public/images/galery
mkdir -p public/images/tentang-kami
mkdir -p public/images/logo

# 5. Copy placeholder images to public/images
echo "Creating placeholder images..."
cat > public/images/placeholder.jpg << 'EOF'
data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+CiAgPHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNiIgZmlsbD0iIzljYTNhZiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPk5vIEltYWdlIEF2YWlsYWJsZTwvdGV4dD4KPC9zdmc+
EOF

# 6. Clear all caches
echo "Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 7. Rebuild caches
echo "Rebuilding caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 8. Test image access
echo "Testing image access..."
if [ -f "public/storage/products/O7V65uBHBhRC4Z6vBZPfDKE8j7vhdTLT4FsVlXGA.jpg" ]; then
    echo "✅ Product image exists"
else
    echo "❌ Product image missing"
fi

if [ -f "public/images/placeholder.jpg" ]; then
    echo "✅ Placeholder image exists"
else
    echo "❌ Placeholder image missing"
fi

echo "🎉 Production image fix completed!"
echo ""
echo "Next steps:"
echo "1. Check if images are now visible"
echo "2. If still not working, check file permissions"
echo "3. Verify .htaccess is working correctly"
