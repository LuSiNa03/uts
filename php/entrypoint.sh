#!/bin/bash
cd /var/www/html

until php artisan db:show > /dev/null 2>&1; do
  echo "Waiting for database..."
  sleep 2
done

php artisan migrate --force
php artisan db:seed --force

php-fpm
