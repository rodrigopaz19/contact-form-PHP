FROM php:8.2-fpm-alpine
RUN docker-php-ext-enable opcache
RUN a2enmod rewrite
COPY ./src/ /var/www/html/
EXPOSE 80
