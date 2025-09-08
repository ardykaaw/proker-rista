#!/bin/bash

echo "🔍 Debug Build Script"
echo "===================="

# Check if node_modules exists
if [ ! -d "node_modules" ]; then
    echo "📦 Installing dependencies..."
    npm install
fi

# Check if package.json exists
if [ ! -f "package.json" ]; then
    echo "❌ package.json not found!"
    exit 1
fi

# Check if vite.config.js exists
if [ ! -f "vite.config.js" ]; then
    echo "❌ vite.config.js not found!"
    exit 1
fi

echo "🔨 Building assets..."
npm run build

# Check if build was successful
if [ ! -d "public/build" ]; then
    echo "❌ Build failed! public/build directory not found"
    exit 1
fi

echo "✅ Build completed successfully!"
echo "📁 Build files:"
ls -la public/build/

echo ""
echo "🧪 Testing local server..."
echo "Run: php artisan serve"
echo "Then open: http://localhost:8000"
echo ""
echo "🔍 Check browser console for any JavaScript errors"
echo "📱 Test on mobile devices for responsive design"
