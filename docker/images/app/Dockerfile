FROM php:7.1-fpm-alpine
MAINTAINER Filip Nowacki <hello@nowacki.it>

RUN apk update \
 && apk add --no-cache --virtual .php-extentions-deps \
    libxml2-dev libmcrypt-dev git g++ make autoconf openssh-client

RUN docker-php-source extract
RUN docker-php-ext-install pdo pdo_mysql xmlrpc mcrypt opcache zip soap bcmath mbstring

RUN rm -r /usr/local/etc/php-fpm.conf /usr/local/etc/php-fpm.conf.default /usr/local/etc/php-fpm.d/*

COPY php.ini /usr/local/etc/php/
COPY php-fpm.conf /usr/local/etc/
COPY www.conf /usr/local/etc/php-fpm.d/

CMD ["/usr/local/sbin/php-fpm"]