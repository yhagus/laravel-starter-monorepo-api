#!/bin/sh
composer install --no-interaction --optimize-autoloader
composer artisan:customer octane:frankenphp --host=0.0.0.0 --watch
