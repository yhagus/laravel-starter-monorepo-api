#!/bin/sh
if [ ! -f .env ]; then
  cp .env.example .env
  composer artisan:customer key:generate
fi

composer install --no-interaction --optimize-autoloader
composer update --no-interaction --optimize-autoloader
composer artisan:customer octane:frankenphp --host=0.0.0.0 --watch
