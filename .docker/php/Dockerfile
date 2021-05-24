FROM php:7.4-fpm-alpine

RUN apk upgrade --update && apk add \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- \
  --install-dir=/usr/bin --filename=composer

WORKDIR /app

