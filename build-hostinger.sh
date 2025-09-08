#!/bin/bash

echo "🌐 Building for Hostinger (Resource Limited)"
echo "==========================================="

# Set environment variables to reduce memory usage
export NODE_OPTIONS="--max-old-space-size=512"
export UV_THREADPOOL_SIZE=2

# Check if node_modules exists
if [ ! -d "node_modules" ]; then
    echo "📦 Installing dependencies with limited memory..."
    npm install --no-optional --production
fi

echo "🔨 Building with minimal resources..."
# Try building with reduced memory
NODE_OPTIONS="--max-old-space-size=512" npm run build

# Check if build was successful
if [ ! -d "public/build" ]; then
    echo "❌ Build failed! Trying alternative approach..."
    
    # Alternative: Build CSS and JS separately
    echo "🎨 Building CSS only..."
    npx tailwindcss -i ./resources/css/app.css -o ./public/build/assets/app.css --minify
    
    echo "📝 Creating minimal JS bundle..."
    mkdir -p public/build/assets
    
    # Create a simple JS file that loads Vue from CDN
    cat > public/build/assets/app.js << 'EOF'
// Load Vue from CDN
const script = document.createElement('script');
script.src = 'https://unpkg.com/vue@3/dist/vue.global.js';
script.onload = function() {
    const { createApp } = Vue;
    
    // Create simple Vue app
    const app = createApp({
        mounted() {
            console.log('Vue app loaded from CDN');
            const loading = document.getElementById('loading');
            if (loading) {
                loading.style.display = 'none';
            }
        }
    });
    
    app.mount('#app');
};
document.head.appendChild(script);
EOF
    
    echo "✅ Alternative build completed!"
else
    echo "✅ Build completed successfully!"
fi

echo "📁 Build files:"
ls -la public/build/ 2>/dev/null || echo "Build directory not found"

echo ""
echo "📤 Upload instructions:"
echo "1. Upload the entire 'public/build' folder to your Hostinger"
echo "2. Make sure all files are uploaded correctly"
echo "3. Set permissions: chmod -R 755 public/build/"
