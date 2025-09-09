#!/bin/bash

echo "Fixing image issues for Hostinger deployment..."

# Create storage directory if it doesn't exist
mkdir -p storage/app/public/products
mkdir -p public/images

# Create a simple placeholder image
echo "Creating placeholder image..."
cat > public/images/placeholder.svg << 'EOF'
<svg width="400" height="300" xmlns="http://www.w3.org/2000/svg">
  <rect width="100%" height="100%" fill="#f3f4f6"/>
  <text x="50%" y="50%" font-family="Arial, sans-serif" font-size="16" fill="#9ca3af" text-anchor="middle" dy=".3em">No Image Available</text>
</svg>
EOF

# Copy placeholder as jpg (for compatibility)
cp public/images/placeholder.svg public/images/placeholder.jpg

# Set proper permissions
chmod -R 755 storage
chmod -R 755 public
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

echo "Image fixes completed!"
echo "Make sure to:"
echo "1. Upload your images to public/images/ directory"
echo "2. Check that public/storage symlink exists"
echo "3. Verify storage/app/public/products directory exists"
