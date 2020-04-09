FROM composer:1.8.5 as composer

################################################################################

FROM php:7.4.3-fpm-buster as base

# dependencies installieren
RUN apt-get update \
 && apt-get install -y \
        git unzip \
        libzip-dev \
        libc-client-dev \
        # MongoDb
        libicu-dev libcurl4-openssl-dev pkg-config libssl-dev \
 && rm -rf /var/lib/apt/lists/* \
 && pecl install -o -f redis mongodb \
 && rm -rf /tmp/pear \
 && docker-php-ext-install -j$(nproc) intl pdo_mysql bcmath zip opcache \
 && docker-php-ext-enable redis mongodb

# add user
RUN adduser --disabled-password --no-create-home --home /app/ --gecos '' app
WORKDIR /app/
RUN chown -R app:app /app/

################################################################################

FROM base as build

# composer dependencies
RUN apt-get update \
 && apt-get install -y git unzip \
 && rm -rf /var/lib/apt/lists/*

# composer kopieren
COPY --from=composer /usr/bin/composer /usr/bin/composer

# composer.json und composer.lock kopieren
COPY --chown=app:app composer.* /app/

# composer install
USER app
RUN composer global require hirak/prestissimo
RUN /usr/bin/composer install --no-progress
USER root

################################################################################

FROM base as development

# xdebug
RUN apt-get update \
 && apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git \
 && rm -rf /var/lib/apt/lists/* \
 && pecl install xdebug-2.9.2 \
 && docker-php-ext-enable xdebug
COPY ./docker/php/php-xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini
EXPOSE 9000

# tideways
RUN apt-get update \
 && apt-get install -yq --no-install-recommends gnupg2 curl sudo ca-certificates \
 && echo 'deb http://s3-eu-west-1.amazonaws.com/tideways/packages debian main' > /etc/apt/sources.list.d/tideways.list \
 && curl -sS 'https://s3-eu-west-1.amazonaws.com/tideways/packages/EEB5E8F4.gpg' | apt-key add - \
 && apt-get update \
 && apt-get install tideways-php
COPY ./docker/php/php-tideways.ini /usr/local/etc/php/conf.d/tideways.ini

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./docker/php/php-custom.ini /usr/local/etc/php/conf.d/
COPY ./docker/php/fpm-pool.conf /usr/local/etc/php-fpm.d/www.conf
COPY --chown=app:app --from=build /app /app
COPY --chown=app:app . /app
