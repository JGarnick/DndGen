FROM php:7.3-fpm

RUN apt-get update \
    && curl -sL https://deb.nodesource.com/setup_11.x -o nodesource_setup.sh \
    && bash nodesource_setup.sh \
    && apt-get install -y nodejs nano git \