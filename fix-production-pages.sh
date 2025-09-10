#!/bin/bash

echo "🔧 Fixing production pages issues..."

# 1. Clear all caches
echo "Step 1: Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 2. Rebuild caches
echo "Step 2: Rebuilding caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Check routes
echo "Step 3: Checking routes..."
php artisan route:list | grep -E "(sejarah|produk)"

# 4. Test API endpoints
echo "Step 4: Testing API endpoints..."
echo "Testing /api/products endpoint..."
curl -s -o /dev/null -w "%{http_code}" http://127.0.0.1:8000/api/products
echo ""

# 5. Test pages
echo "Step 5: Testing pages..."
echo "Testing /sejarah page..."
curl -s -o /dev/null -w "%{http_code}" http://127.0.0.1:8000/sejarah
echo ""

echo "Testing /produk page..."
curl -s -o /dev/null -w "%{http_code}" http://127.0.0.1:8000/produk
echo ""

# 6. Check file permissions
echo "Step 6: Checking file permissions..."
ls -la resources/views/sejarah.blade.php
ls -la resources/views/produk.blade.php

# 7. Check if views are compiled
echo "Step 7: Checking compiled views..."
ls -la storage/framework/views/ | head -5

# 8. Create test script
echo "Step 8: Creating test script..."
cat > public/test-pages.html << 'EOF'
<!DOCTYPE html>
<html>
<head>
    <title>Page Test - Desa Rakadua</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .test-section { margin: 20px 0; padding: 20px; border: 1px solid #eee; }
        .success { color: green; }
        .error { color: red; }
        iframe { width: 100%; height: 300px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>🧪 Page Test - Desa Rakadua</h1>
    
    <div class="test-section">
        <h2>1. Sejarah Page Test</h2>
        <iframe src="/sejarah" title="Sejarah Page"></iframe>
        <p><a href="/sejarah" target="_blank">Open in new tab: /sejarah</a></p>
    </div>
    
    <div class="test-section">
        <h2>2. Produk Page Test</h2>
        <iframe src="/produk" title="Produk Page"></iframe>
        <p><a href="/produk" target="_blank">Open in new tab: /produk</a></p>
    </div>
    
    <div class="test-section">
        <h2>3. API Test</h2>
        <button onclick="testAPI()">Test API Products</button>
        <div id="apiResult"></div>
    </div>
    
    <script>
        async function testAPI() {
            const resultDiv = document.getElementById('apiResult');
            resultDiv.innerHTML = 'Testing API...';
            
            try {
                const response = await fetch('/api/products');
                const data = await response.json();
                
                if (response.ok) {
                    resultDiv.innerHTML = `<div class="success">✅ API Success: ${data.length} products found</div>`;
                } else {
                    resultDiv.innerHTML = `<div class="error">❌ API Error: ${response.status} ${response.statusText}</div>`;
                }
            } catch (error) {
                resultDiv.innerHTML = `<div class="error">❌ API Error: ${error.message}</div>`;
            }
        }
    </script>
</body>
</html>
EOF

echo "✅ Production pages fix completed!"
echo ""
echo "📋 Next steps:"
echo "1. Test locally: http://127.0.0.1:8000/test-pages.html"
echo "2. Check if pages load correctly"
echo "3. If still having issues, check server logs"
echo "4. Deploy to production and test there"
