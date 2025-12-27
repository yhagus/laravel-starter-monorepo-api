ARG BASE_RUNTIME_IMAGE="dunglas/frankenphp:1-php8.5.1-alpine"
ARG COMPOSER_IMAGE="composer:2.9.2"

FROM ${COMPOSER_IMAGE} AS composer

FROM ${BASE_RUNTIME_IMAGE} AS builder

WORKDIR /var/www/html

RUN install-php-extensions \
    pcntl \
    exif \
    pdo \
    pdo_pgsql \
    sockets

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

FROM builder as final

WORKDIR /app

COPY --from=builder /var/www/html /tmp/html

RUN rm -rf /tmp/html/apps

RUN mkdir -p /app && cp -a /tmp/html/. /app/

COPY --from=builder /var/www/html/apps/customer /app/apps/customer

EXPOSE 8000

#ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
