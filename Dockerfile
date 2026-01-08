# Dockerfile
FROM php:8.2-fpm

# Install system dependencies for Composer + extensions
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

