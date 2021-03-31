FROM php:7.3-apache
COPY ./php.ini /usr/local/etc/php/
COPY ./*.conf /etc/apache2/sites-enabled/
 RUN if command -v a2enmod >/dev/null 2>&1; then \
    a2enmod rewrite headers \
  ;fi
RUN apt-get update && apt-get install -y vim
RUN docker-php-ext-install mysqli pdo_mysql
