FROM php:8.2-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    imagemagick \
    mariadb-client

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install mysqli pdo pdo_mysql zip gd mbstring pcntl

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

WORKDIR /var/www

USER $user
