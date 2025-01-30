#!/usr/bin/env bash

echo "Running composer..."
composer install --no-dev --optimize-autoloader

echo "Installing Doctrine DBAL (if needed)..."
composer require doctrine/dbal --no-interaction --no-progress

echo "Generating application key..."
php artisan key:generate --force

echo "Clearing and caching configurations..."
php artisan config:clear
php artisan cache:clear
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Deployment completed successfully!"
