FROM php:7.0-fpm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN docker-php-ext-install pdo pdo_mysql

RUN useradd -ms /bin/bash sarathdr
 
USER sarathdr
 
WORKDIR /app