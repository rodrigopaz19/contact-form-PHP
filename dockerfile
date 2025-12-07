FROM php:8.2-fpm-alpine
EXPOSE 80
CMD ["apache2-foreground"]
