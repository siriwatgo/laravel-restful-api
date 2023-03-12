# FROM php:8.1.16-apache-buster
FROM php:8.1.16-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install extensions
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions mbstring pdo_mysql zip exif pcntl gd

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# TimeZone
RUN cp /usr/share/zoneinfo/Asia/Bangkok /etc/localtime \
    && echo "Asia/Bangkok" >  /etc/timezone

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# # Install extensions
# # Install the PHP pdo_mysql extention
# RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath zip intl
# # Install the PHP pdo_pgsql extention
# RUN docker-php-ext-install pdo_pgsql
# # Install the PHP gd library
# RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
# RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# This has to come after the above copy, otherwise the code will not yet be available in the container.
# RUN php artisan key:generate

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# RUN php artisan key:generate
# RUN php artisan migrate --seed

# Expose port 9000 and start php-fpm server
EXPOSE 9000
EXPOSE 22
CMD ["php-fpm"]