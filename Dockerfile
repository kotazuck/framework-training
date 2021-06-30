FROM php:7.4-apache

COPY ./ /var/www/html/framework
ENV APACHE_DOCUMENT_ROOT /var/www/html/framework/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN sed -ri -e 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

RUN apt-get update && docker-php-ext-install pdo_mysql && a2enmod rewrite

