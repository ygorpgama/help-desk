FROM php:8.3-fpm

ARG user=admin
ARG uid=1000

RUN apt-get update && apt-get install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

RUN docker-php-ext-install pgsql gd sockets mbstring exif pcntl bcmath pdo_pgsql pdo

# Copy composer image from docker
COPY --from=composer:2.7.4 /usr/bin/composer /usr/bin/composer

# Copy node image from docker
COPY --from=node:20.15.1 /usr/local/bin/node /usr/local/bin/node

# Copy npm image from docker
COPY --from=node:20.15.1 /usr/local/lib/node_modules /usr/local/lib/node_modules

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

USER $user

EXPOSE 9000
