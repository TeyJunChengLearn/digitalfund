#!/usr/bin/env bash

echo "Deploying Laravel on Render..."

# Run composer install
composer install --no-dev --optimize-autoloader

# Ensure correct permissions
chmod -R 777 storage bootstrap/cache

# Generate application key
php artisan key:generate --force

# Clear & cache configurations
php artisan config:clear
php artisan cache:clear
php artisan config:cache

# Cache routes
php artisan route:cache

# Run migrations
php artisan migrate --force

echo "✅ Deployment successful!"
