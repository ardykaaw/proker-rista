# Desa Rakadua - Deployment Guide

## 🚀 Quick Deployment to Hostinger

### 1. Clone Repository
```bash
git clone https://github.com/yourusername/desa-rakadua.git
cd desa-rakadua
```

### 2. Install Dependencies
```bash
composer install --optimize-autoloader --no-dev
```

### 3. Environment Setup
```bash
cp .env.example .env
# Edit .env with your database credentials
```

### 4. Database Setup
```bash
php artisan migrate --force
php artisan db:seed --force
```

### 5. Storage & Permissions
```bash
php artisan storage:link
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public
```

### 6. Cache Optimization
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📁 File Structure for Hostinger

```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/          # Contents of public folder
│   ├── images/      # All static images
│   ├── storage/     # Symlink to storage/app/public
│   └── index.php
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── .htaccess
├── artisan
└── composer.json
```

## 🖼️ Image Management

### Static Images (public/images/)
- `herosection/` - Hero background images
- `berita/` - News and event images
- `galery/` - Gallery images
- `tentang-kami/` - About us images
- `logo/` - Logo files

### Dynamic Images (storage/app/public/products/)
- Product images uploaded via admin panel
- Automatically managed by Laravel

## 🔧 Troubleshooting

### Images Not Loading
1. Check if `public/storage` symlink exists
2. Verify permissions: `chmod -R 755 storage public`
3. Check if images exist in `public/images/` directory

### Admin Panel Issues
1. Default login: `admin@desarakadua.com` / `admin123`
2. Check database connection in `.env`
3. Run `php artisan migrate` if tables missing

### Performance Issues
1. Run `php artisan config:cache`
2. Run `php artisan route:cache`
3. Run `php artisan view:cache`

## 📱 Features

- ✅ Responsive design (mobile-friendly)
- ✅ Product management system
- ✅ Image upload with fallbacks
- ✅ WhatsApp integration
- ✅ Admin dashboard
- ✅ SEO optimized

## 🎨 Customization

### Colors
- Primary: `#0992d6`
- Secondary: `#0882c0`
- Success: `#10b981`
- Warning: `#f59e0b`

### Fonts
- Primary: Inter
- Secondary: Poppins
- Body: Noto Sans

## 📞 Support

For issues or questions, please check:
1. This README file
2. HOSTINGER-DEPLOYMENT-GUIDE.md
3. Laravel logs in `storage/logs/`
