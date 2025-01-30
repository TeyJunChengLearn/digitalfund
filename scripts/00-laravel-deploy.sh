#!/usr/bin/env bash

set -e  # Stop the script if any command fails

echo "Checking system dependencies..."
if ! command -v composer &> /dev/null || ! command -v php &> /dev/null; then
    echo "Error: Composer or PHP is not installed."
    exit 1
fi

echo "Navigating to the Laravel project directory..."
cd /var/www/html || { echo "Error: Directory /var/www/html not found!"; exit 1; }

echo "Ensuring .env file exists..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo "Created .env file from .env.example"
fi

echo "Running composer..."
if [ ! -d "vendor" ]; then
    composer install --no-dev --optimize-autoloader
else
    echo "Dependencies already installed. Skipping composer install."
fi

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

echo "Checking database connection..."
if ! pg_isready -q; then
    echo "Error: PostgreSQL is not running. Starting PostgreSQL..."
    sudo systemctl start postgresql
fi

echo "Running migrations..."
php artisan migrate --force

echo "Restarting services..."
sudo systemctl restart nginx
sudo systemctl restart php-fpm

echo "Deployment completed successfully!"
