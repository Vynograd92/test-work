FROM php:8.0-fpm-alpine
WORKDIR "/application"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apk --no-cache add autoconf g++ make \
    && apk add --update linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && mkdir -p docker/php/conf.d \
    && touch docker/php/conf.d/xdebug.ini \
    && touch docker/php/conf.d/error_reporting.ini