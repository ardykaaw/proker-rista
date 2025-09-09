#!/bin/bash

echo "Preparing project for GitHub deployment..."

# Create necessary directories
echo "Creating directories..."
mkdir -p public/images/herosection
mkdir -p public/images/berita
mkdir -p public/images/galery
mkdir -p public/images/tentang-kami
mkdir -p public/images/logo
mkdir -p storage/app/public/products

# Create placeholder images for missing ones
echo "Creating placeholder images..."

# Hero section placeholders
cat > public/images/herosection/bg-hero2.jpg << 'EOF'
data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwMCIgaGVpZ2h0PSI4MDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0iIzA5OTJkNiIvPgogIDx0ZXh0IHg9IjUwJSIgeT0iNTAlIiBmb250LWZhbWlseT0iQXJpYWwsIHNhbnMtc2VyaWYiIGZvbnQtc2l6ZT0iNDgiIGZpbGw9IndoaXRlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+REVTQSBSQUtBRFVBPC90ZXh0Pgo8L3N2Zz4=
EOF

# Berita placeholders
cat > public/images/berita/placeholder1.jpeg << 'EOF'
data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+CiAgPHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNiIgZmlsbD0iIzljYTNhZiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkJlcml0YSBEZXNhPC90ZXh0Pgo8L3N2Zz4=
EOF

# Galeri placeholders
for i in {1..6}; do
    cat > public/images/galery/galeri$i.jpg << 'EOF'
data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+CiAgPHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNiIgZmlsbD0iIzljYTNhZiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkdhbGVyaSBEZXNhPC90ZXh0Pgo8L3N2Zz4=
EOF
done

# Tentang kami placeholder
cat > public/images/tentang-kami/image1.jpg << 'EOF'
data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjNmNGY2Ii8+CiAgPHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNiIgZmlsbD0iIzljYTNhZiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkRlc2EgUmFrYWR1YTwvdGV4dD4KPC9zdmc+
EOF

# Logo placeholders
cat > public/images/logo/logo-umkm.png << 'EOF'
data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjgwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgogIDxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9IiMwOTkyZDYiLz4KICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE4IiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkRlc2EgUmFrYWR1YTwvdGV4dD4KPC9zdmc+
EOF

cat > public/images/logo/logo-gabung.png << 'EOF'
data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjgwIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgogIDxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9IiMwOTkyZDYiLz4KICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjE4IiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkRlc2EgUmFrYWR1YTwvdGV4dD4KPC9zdmc+
EOF

# Copy berita placeholders to specific files
cp public/images/berita/placeholder1.jpeg public/images/berita/WhatsApp\ Image\ 2025-09-05\ at\ 12.35.33.jpeg
cp public/images/berita/placeholder1.jpeg public/images/berita/WhatsApp\ Image\ 2025-09-05\ at\ 12.44.50.jpeg
cp public/images/berita/placeholder1.jpeg public/images/berita/foto-log-book-1756512049.jpeg

# Set proper permissions
echo "Setting permissions..."
chmod -R 755 public/images
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Create storage symlink
echo "Creating storage symlink..."
php artisan storage:link

# Clear caches
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

echo "Project prepared for GitHub deployment!"
echo ""
echo "Next steps:"
echo "1. git add ."
echo "2. git commit -m 'Fix image paths and add fallbacks'"
echo "3. git push origin main"
echo ""
echo "After deployment to Hostinger:"
echo "1. Run: php artisan storage:link"
echo "2. Set proper permissions: chmod -R 755 storage public"
echo "3. Upload your actual images to replace placeholders"
