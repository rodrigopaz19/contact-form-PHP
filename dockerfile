FROM php:8.2-fpm-alpine
RUN docker-php-ext-enable opcache
COPY ./src/ /var/www/html/
EXPOSE 80
