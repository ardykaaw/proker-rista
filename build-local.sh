#!/bin/bash

echo "🏠 Building for Local Development"
echo "================================="

# Check if node_modules exists
if [ ! -d "node_modules" ]; then
    echo "📦 Installing dependencies..."
    npm install
fi

echo "🔨 Building assets for production..."
npm run build

# Check if build was successful
if [ ! -d "public/build" ]; then
    echo "❌ Build failed! public/build directory not found"
    exit 1
fi

echo "✅ Build completed successfully!"
echo "📁 Build files created:"
ls -la public/build/

echo ""
echo "📤 Upload these files to Hostinger:"
echo "1. Upload entire 'public/build' folder to yourdomain.com/public/build/"
echo "2. Make sure all files in public/build are uploaded"
echo "3. Set correct permissions: chmod -R 755 public/build/"
echo ""
echo "🧪 Test locally first:"
echo "php artisan serve"
echo "Then open: http://localhost:8000"
