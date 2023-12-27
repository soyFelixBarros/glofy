FROM php:7.3-apache

ENV DEBIAN_FRONTEND="noninteractive"

RUN apt-get update && \
    apt install -my build-essential && \
    apt install -my libmcrypt-dev && \
    apt install -my libpng-dev && \
    apt install -my zlib1g-dev && \
    apt install -my libicu-dev && \
    apt install -my libxml2-dev && \
    apt install -my libzip-dev && \
    apt install -my g++ && \
    apt install -my git && \
    apt install -my mc && \
    apt install -my nano && \
    docker-php-ext-install gd && \
    docker-php-ext-install intl && \
    docker-php-ext-install opcache && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install zip

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get update && apt-get install -y curl gnupg2 && \
    curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && apt-get install -y yarn

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Instalamos composer 2.2.21
COPY --from=composer:2.2.21 /usr/bin/composer /usr/bin/composer

# Enable Apache mods
RUN a2enmod allowmethods \
    && a2enmod headers \
    && a2enmod mime \
    && a2enmod rewrite