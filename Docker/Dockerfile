FROM php:7.3-apache

COPY ./*.conf /etc/apache2/sites-enabled/
COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y vim
RUN docker-php-ext-install mysqli pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
