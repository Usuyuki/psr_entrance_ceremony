FROM php:8.0-fpm

RUN apt-get update \
    && apt-get install -y vim git zip unzip\
    && docker-php-ext-install pdo_mysql

ADD ./php.ini /usr/local/etc/php/php.ini

COPY --from=composer /usr/bin/composer /usr/bin/composer