#!/bin/bash

echo "🔧 Fixing placeholder images..."

# Create proper SVG placeholder images
create_svg_placeholder() {
    local filename="$1"
    local text="$2"
    local width="${3:-400}"
    local height="${4:-300}"
    
    cat > "$filename" << EOF
<svg width="$width" height="$height" xmlns="http://www.w3.org/2000/svg">
  <rect width="100%" height="100%" fill="#f3f4f6"/>
  <text x="50%" y="50%" font-family="Arial, sans-serif" font-size="16" fill="#9ca3af" text-anchor="middle" dy=".3em">$text</text>
</svg>
EOF
}

# Fix placeholder.jpg
echo "Fixing placeholder.jpg..."
create_svg_placeholder "public/images/placeholder.jpg" "No Image Available"

# Fix hero section images
echo "Fixing hero section images..."
create_svg_placeholder "public/images/herosection/bg-hero2.jpg" "Desa Rakadua" 1200 800
create_svg_placeholder "public/images/herosection/bg-hero6.jpeg" "Desa Rakadua" 1200 800
create_svg_placeholder "public/images/herosection/bg-hero3.jpg" "Desa Rakadua" 1200 800
create_svg_placeholder "public/images/herosection/bg-hero7.jpeg" "Desa Rakadua" 1200 800
create_svg_placeholder "public/images/herosection/bg-hero5.jpeg" "Desa Rakadua" 1200 800

# Fix berita images
echo "Fixing berita images..."
create_svg_placeholder "public/images/berita/WhatsApp Image 2025-09-05 at 12.35.33.jpeg" "Berita Desa" 400 300
create_svg_placeholder "public/images/berita/WhatsApp Image 2025-09-05 at 12.44.50.jpeg" "Berita Desa" 400 300
create_svg_placeholder "public/images/berita/foto-log-book-1756512049.jpeg" "Berita Desa" 400 300

# Fix galeri images
echo "Fixing galeri images..."
for i in {1..6}; do
    create_svg_placeholder "public/images/galery/galeri$i.jpg" "Galeri Desa" 400 300
done

# Fix tentang kami images
echo "Fixing tentang kami images..."
create_svg_placeholder "public/images/tentang-kami/image1.jpg" "Desa Rakadua" 400 300

# Fix logo images
echo "Fixing logo images..."
create_svg_placeholder "public/images/logo/logo-umkm.png" "Desa Rakadua" 200 80
create_svg_placeholder "public/images/logo/logo-gabung.png" "Desa Rakadua" 200 80

# Set proper permissions
chmod -R 755 public/images

echo "✅ All placeholder images fixed!"
echo "📁 Check public/images/ directory"
