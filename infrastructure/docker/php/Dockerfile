FROM php:7.3-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

# locale
ENV LANG=en_US.UTF-8 \
    LANGUAGE=en_US:en \
    LC_ALL=en_US.UTF-8 \
    # composer environment
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update \
    && apt-get -y install \
    git  \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    locales \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    g++ \
    gcc \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && locale-gen en_US.UTF-8 \
    && localedef -f UTF-8 -i en_US en_US.UTF-8 \
    && mkdir /var/run/php-fpm

RUN docker-php-ext-configure \
    gd --with-png-dir=/usr/include --with-jpeg-dir=/usr/include && \
    docker-php-ext-install -j$(nproc) \
    intl \
    pdo_mysql \
    mbstring \
    zip \
    bcmath \
    gd

RUN composer config -g process-timeout 3600 \
    && composer config -g repos.packagist composer https://packagist.org \
    && composer global require hirak/prestissimo

COPY ./php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /work