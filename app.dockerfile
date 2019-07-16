FROM php:7.3-fpm

#COPY --chown=www-data:www-data ./ /var/www

#WORKDIR /var/www

RUN apt-get update \
    && docker-php-ext-install pdo_mysql