# Stage 1: Build Laravel application with PHP
FROM php:8.2-fpm AS laravel

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    netcat-openbsd \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy the Laravel application
COPY . .

# Copy the startup script
COPY scripts/startup.sh /scripts/startup.sh
RUN chmod 755 /scripts/startup.sh

# Install PHP dependencies
RUN composer install --prefer-dist --no-dev --optimize-autoloader

# Set file permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
