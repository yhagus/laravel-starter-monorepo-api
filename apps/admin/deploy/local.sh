#!/bin/sh
if [ ! -f .env ]; then
  cp .env.example .env
  composer artisan:customer key:generate
fi
exec php apps/admin/artisan octane:frankenphp --host=0.0.0.0 --watch
