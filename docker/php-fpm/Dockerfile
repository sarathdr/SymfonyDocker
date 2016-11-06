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

WORKDIR /app

ADD . ./

RUN usermod -u 1000 www-data

RUN chown -R www-data var/logs
RUN chown -R www-data var/cache
RUN chown -R www-data var/sessions

RUN composer install --no-scripts

CMD php-fpm -F --allow-to-run-as-root

