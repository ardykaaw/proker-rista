#!/bin/bash

echo "🚀 Final production fix for image issues..."

# 1. Fix .htaccess for image access
echo "Step 1: Fixing .htaccess..."
cat > .htaccess << 'EOF'
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Block access to bg_video files
    RewriteRule ^images/bg/video/.*\.mp4$ - [F,L]

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Allow direct access to images and static files
    RewriteCond %{REQUEST_FILENAME} -f
    RewriteRule ^(images|css|js|storage)/.*$ - [L]
    
    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
EOF

# 2. Fix placeholder images
echo "Step 2: Fixing placeholder images..."
./fix-placeholder-images.sh

# 3. Ensure storage symlink exists
echo "Step 3: Ensuring storage symlink..."
php artisan storage:link

# 4. Copy storage files to public as backup
echo "Step 4: Creating backup of storage files..."
mkdir -p public/storage/products
cp -r storage/app/public/products/* public/storage/products/ 2>/dev/null || true

# 5. Set proper permissions
echo "Step 5: Setting permissions..."
chmod -R 755 storage
chmod -R 755 public
chmod -R 755 bootstrap/cache

# 6. Clear and rebuild caches
echo "Step 6: Clearing and rebuilding caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 7. Test image access
echo "Step 7: Testing image access..."
echo "Testing placeholder image:"
if [ -f "public/images/placeholder.jpg" ]; then
    echo "✅ Placeholder image exists"
    file public/images/placeholder.jpg
else
    echo "❌ Placeholder image missing"
fi

echo "Testing product image:"
if [ -f "public/storage/products/O7V65uBHBhRC4Z6vBZPfDKE8j7vhdTLT4FsVlXGA.jpg" ]; then
    echo "✅ Product image exists"
    file public/storage/products/O7V65uBHBhRC4Z6vBZPfDKE8j7vhdTLT4FsVlXGA.jpg
else
    echo "❌ Product image missing"
fi

echo "Testing hero image:"
if [ -f "public/images/herosection/bg-hero2.jpg" ]; then
    echo "✅ Hero image exists"
    file public/images/herosection/bg-hero2.jpg
else
    echo "❌ Hero image missing"
fi

# 8. Create test HTML file
echo "Step 8: Creating test HTML file..."
cat > public/test-images.html << 'EOF'
<!DOCTYPE html>
<html>
<head>
    <title>Image Test</title>
</head>
<body>
    <h1>Image Test</h1>
    
    <h2>Placeholder Image:</h2>
    <img src="images/placeholder.jpg" alt="Placeholder" style="width: 200px; height: 150px;">
    
    <h2>Product Image:</h2>
    <img src="storage/products/O7V65uBHBhRC4Z6vBZPfDKE8j7vhdTLT4FsVlXGA.jpg" alt="Product" style="width: 200px; height: 150px;">
    
    <h2>Hero Image:</h2>
    <img src="images/herosection/bg-hero2.jpg" alt="Hero" style="width: 200px; height: 150px;">
    
    <h2>Direct URLs:</h2>
    <p>Placeholder: <a href="images/placeholder.jpg" target="_blank">images/placeholder.jpg</a></p>
    <p>Product: <a href="storage/products/O7V65uBHBhRC4Z6vBZPfDKE8j7vhdTLT4FsVlXGA.jpg" target="_blank">storage/products/O7V65uBHBhRC4Z6vBZPfDKE8j7vhdTLT4FsVlXGA.jpg</a></p>
    <p>Hero: <a href="images/herosection/bg-hero2.jpg" target="_blank">images/herosection/bg-hero2.jpg</a></p>
</body>
</html>
EOF

echo ""
echo "🎉 Final production fix completed!"
echo ""
echo "📋 Next steps:"
echo "1. Test locally: http://localhost:8000/test-images.html"
echo "2. git add ."
echo "3. git commit -m 'Fix production image issues - final fix'"
echo "4. git push origin main"
echo "5. Deploy to Hostinger"
echo "6. Test on production: https://umkmrakadua.com/test-images.html"
echo ""
echo "🔍 If images still don't work:"
echo "1. Check server logs"
echo "2. Verify .htaccess is working"
echo "3. Check file permissions on Hostinger"
echo "4. Test direct image URLs"
