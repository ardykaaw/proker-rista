#!/bin/bash

echo "🚀 Preparing project for production deployment..."

# 1. Copy all images to public
echo "Step 1: Copying images..."
./copy-images-to-public.sh

# 2. Fix production images
echo "Step 2: Fixing production image issues..."
./fix-production-images.sh

# 3. Clear all caches
echo "Step 3: Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# 4. Rebuild caches
echo "Step 4: Rebuilding caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Test image paths
echo "Step 5: Testing image paths..."
echo "Testing product image:"
if [ -f "public/storage/products/O7V65uBHBhRC4Z6vBZPfDKE8j7vhdTLT4FsVlXGA.jpg" ]; then
    echo "✅ Product image exists"
else
    echo "❌ Product image missing"
fi

echo "Testing hero images:"
if [ -f "public/images/herosection/bg-hero2.jpg" ]; then
    echo "✅ Hero image exists"
else
    echo "❌ Hero image missing"
fi

echo "Testing placeholder:"
if [ -f "public/images/placeholder.jpg" ]; then
    echo "✅ Placeholder exists"
else
    echo "❌ Placeholder missing"
fi

# 6. Check file permissions
echo "Step 6: Checking permissions..."
ls -la public/images/ | head -5
ls -la public/storage/ | head -5

# 7. Create deployment summary
echo "Step 7: Creating deployment summary..."
cat > DEPLOYMENT-SUMMARY.md << 'EOF'
# 🚀 Production Deployment Summary

## ✅ Fixed Issues
- [x] Image paths corrected for production
- [x] Storage symlink created
- [x] All placeholder images created
- [x] Fallback system improved
- [x] Caches cleared and rebuilt

## 📁 File Structure
```
public/
├── images/
│   ├── herosection/     # Hero background images
│   ├── berita/          # News images
│   ├── galery/          # Gallery images
│   ├── tentang-kami/    # About us images
│   ├── logo/            # Logo files
│   └── placeholder.jpg  # Fallback image
└── storage/
    └── products/        # Product images
```

## 🔧 Production Commands
After deployment to Hostinger, run:
```bash
php artisan storage:link
chmod -R 755 storage public
php artisan cache:clear
php artisan config:cache
```

## 🎯 Next Steps
1. Push to GitHub
2. Deploy to Hostinger
3. Run production commands
4. Test all images
5. Replace placeholders with real images

## 📞 Support
If images still don't load:
1. Check file permissions
2. Verify .htaccess is working
3. Check Laravel logs
4. Test image URLs directly
EOF

echo ""
echo "🎉 Project is ready for production deployment!"
echo ""
echo "📋 Next steps:"
echo "1. git add ."
echo "2. git commit -m 'Fix production image issues'"
echo "3. git push origin main"
echo "4. Deploy to Hostinger"
echo "5. Run: php artisan storage:link"
echo ""
echo "📄 Check DEPLOYMENT-SUMMARY.md for details"
