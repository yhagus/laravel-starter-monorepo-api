ARG BASE_RUNTIME_IMAGE="dunglas/frankenphp:1-php8.5.1-alpine"
ARG COMPOSER_IMAGE="composer:2.9.2"

FROM ${COMPOSER_IMAGE} AS composer

FROM ${BASE_RUNTIME_IMAGE} AS builder

WORKDIR /app

RUN install-php-extensions \
    pcntl \
    exif \
    pdo \
    pdo_pgsql \
    sockets

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . .
