FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y git

RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++ libssl-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Install mongo
RUN pecl install mongodb \
&& echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/ext-mongodb.ini

#install extension zip
RUN apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/app
COPY . /var/www/app

RUN composer update
RUN composer install
RUN composer dump-autoload

RUN php artisan key:generate
RUN php artisan jwt:secret
RUN php artisan config:cache

# Directory permissions
RUN chmod 777 -R /var/www

# CMD docker-php-entrypoint
CMD docker-php-entrypoint php-fpm && php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000