FROM php:7.0-fpm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN docker-php-ext-install pdo pdo_mysql

# Hack for symfony cache folder, need a better solution
USER 1000

WORKDIR /app
