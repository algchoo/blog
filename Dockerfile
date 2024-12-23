FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    libzip-dev \
    netcat-openbsd \
    && docker-php-ext-install \
        pdo_pgsql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
    && apt-get clean

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

COPY scripts/startup.sh /scripts/startup.sh

RUN chmod 755 /scripts/startup.sh \
    && composer install --prefer-dist --no-dev --optimize-autoloader \
    && chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

EXPOSE 9000

CMD ["php-fpm"]
