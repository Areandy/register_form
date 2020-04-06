FROM php:7.2.2-apache

RUN docker-php-ext-install pdo pdo_mysql

COPY assets /var/www/html/assets
COPY client /var/www/html/client
COPY server /var/www/html/server
RUN chmod -R 777 /var/www/html/assets/uploads