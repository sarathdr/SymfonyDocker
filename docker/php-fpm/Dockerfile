FROM php:7.0-fpm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version
RUN apt-get update && \
    apt-get install -y \
      git \
      libpq-dev \
      zip \
      unzip


RUN docker-php-ext-install pdo pdo_mysql

# Hack for symfony cache folder, need a better solution
USER 1000

WORKDIR /app

COPY . ./
RUN chmod -R 777 var/logs
RUN chmod -R 777 var/cache
RUN composer install --prefer-source --no-interaction --no-scripts --no-autoloader
COPY . ./
