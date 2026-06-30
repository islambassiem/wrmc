# WRMC Production Deployment Guide

This guide walks through deploying WRMC application from cloning the repository to running it in production.

---

# Prerequisites

Ensure your production server has:

- Ubuntu 22.04+ (Recommended)
- PHP 8.3+ 
- Composer
- Git
- Sqlite
---

# 1. Connect to Server

```bash
ssh user@your-server-ip
```

---

# 2. Update System

```bash
sudo apt update
sudo apt upgrade -y
```

---

# 3. Install Required Packages

```bash
sudo apt install -y \
git \
curl \
unzip \
nginx \
mysql-server \
php-fpm \
php-cli \
php-mysql \
php-xml \
php-curl \
php-mbstring \
php-bcmath \
php-zip \
php-intl \
php-gd \
composer
```

Verify installations:

```bash
php -v
composer --version
```

---

# 4. Clone Repository

Navigate to the web directory.

```bash
cd /var/www
```

Clone your project.

```bash
git clone https://github.com/islambassiem/wrmc.git
```

Move into the project.

```bash
cd wrmc
```

---

# 5. Install PHP Dependencies

```bash
composer install --no-dev --optimize-autoloader
```

# 6. Configure Environment

Copy the environment file.

```bash
cp .env.example .env
```

Edit the environment.

```bash
nano .env
```

Example:

```env
APP_NAME=wrmc
APP_ENV=production
APP_DEBUG=false
APP_URL=https://wrmc.au

DB_CONNECTION=sqlite
```

---

# 7. Generate Application Key

```bash
php artisan key:generate
```

---
# 8. Run Migrations

```bash
php artisan migrate --seed
```
---

# 9. Create Storage Link

```bash
php artisan storage:link
```

---

# 10. Set Permissions

```bash
sudo chown -R www-data:www-data /var/www/wrmc

sudo chmod -R 755 /var/www/wrmc

sudo chmod -R 775 storage

sudo chmod -R 775 bootstrap/cache
```

---

# 11. Optimize Laravel

```bash
php artisan optimize
```

# 12. Deployment Checklist

- Repository cloned
- Environment configured
- Dependencies installed
- Database migrated
- Storage linked
- Permissions configured
- Laravel optimized
---

# Troubleshooting

## Permission Issues

```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

## Clear All Caches

```bash
php artisan optimize:clear
```

## Check Logs

Laravel logs:

```bash
tail -f storage/logs/laravel.log
```
---
