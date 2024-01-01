FROM php:8.2-fpm

# INSTALL NGINX
RUN apt-get update -y \
    && apt-get install -y nginx

# INSTALL EXTENSIONS
RUN apt-get update && \
    apt-get install --no-install-recommends --no-install-suggests -y \
    git \
    curl \
    libicu-dev \
    build-essential \
    make \
    sudo \
    nano \
    supervisor \
    cron \
    tzdata \
    openssl \
    unzip \
    libssl-dev \
    libonig-dev \
    libcurl4-openssl-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev && \
    ln -fs /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata

# CONFIG EXTENSION GD
RUN apt-get update && apt-get install -y \
    libzip-dev && \
    docker-php-ext-install zip

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd

# DOCKER INSTALL EXTENSIONS
RUN docker-php-ext-install pdo_mysql mbstring iconv
RUN docker-php-ext-install intl
RUN docker-php-ext-install bcmath

# CLEAR CACHE
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# INSTALL COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# CHANGE CONF NGINX
COPY /docker/config/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY /docker/config/nginx/nginx.conf /etc/nginx/nginx.conf
COPY /docker/config/entrypoint.sh /etc/entrypoint.sh

# CONFIG SUPERVISORD
COPY ./docker/config/supervisord/supervisord.conf /etc/supervisord.conf

# CHANGE MEMORY PHP TO 512M
RUN cd /usr/local/etc/php/conf.d/ && \
  echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini && \
  echo 'max_execution_time = 60' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini && \
  echo 'upload_max_filesize = 10M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini && \
  echo 'post_max_size = 20M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

# CREATE FOLDER TO RUN PHP-FPM
RUN mkdir -p /var/run/php

# SET PERMISSION AND EXECUTE
RUN chmod +x /etc/entrypoint.sh

# Crie um novo grupo e usuário
WORKDIR /var/www/app

EXPOSE 80 443
CMD ["/etc/entrypoint.sh"]
