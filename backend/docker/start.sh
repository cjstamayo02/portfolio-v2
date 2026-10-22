#!/bin/sh
set -e
cd /var/www/html
php artisan config:clear
php artisan migrate --force
php artisan config:cache
exec supervisord -c /etc/supervisord.conf
