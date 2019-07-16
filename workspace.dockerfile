FROM php:7.3-fpm

#COPY --chown=www-data:www-data ./ /var/www

#WORKDIR /var/www

#RUN apt-get update \
#    && curl -sL https://deb.nodesource.com/setup_11.x -o nodesource_setup.sh \
#    && bash nodesource_setup.sh \
#    && apt-get install -y nodejs nano git \
#    && npm install --save-dev webpack webpack-cli