FROM php:7.3-apache
COPY ./php.ini /usr/local/etc/php/
COPY ./*.conf /etc/apache2/sites-enabled/

RUN /bin/sh -c a2enmod rewrite
RUN apt-get update && apt-get install -y vim
RUN docker-php-ext-install mysqli pdo_mysql
