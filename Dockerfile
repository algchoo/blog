FROM php:8.2-fpm

ARG APP_ENV=production
ENV APP_ENV=${APP_ENV}

RUN apt-get update && apt-get install -y \
    git \
    curl \
    sqlite3 \
    jq \
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

RUN touch /var/www/database/database.sqlite \
    && composer install --prefer-dist --no-dev --optimize-autoloader \
    && /var/www/scripts/db-setup.sh \
    && /var/www/scripts/load-json.sh \
    && chown -R www-data:www-data /var/www \
    && chmod -R 755 scripts/ \
    && chmod -R 755 /var/www/storage

EXPOSE 9000

CMD ["php-fpm"]
