FROM php:8.1.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite
RUN docker-php-ext-enable mysqli

RUN apt-get update && apt-get upgrade -y