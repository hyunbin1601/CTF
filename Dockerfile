FROM php:8.1-apache

RUN apt-get update \
 && DEBIAN_FRONTEND=noninteractive \
    apt-get install --no-install-recommends -y \
    wget gnupg curl xvfb \
 && apt-get update \
 && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pcntl mysqli


COPY src/ /var/www/html
COPY flag.txt /var/log
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html
RUN chmod -R 777 /var/www/html/uploads


