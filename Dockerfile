# Use the official PHP Apache image
FROM php:8.1-apache

# Install necessary PHP extensions for WordPress
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \  
    && docker-php-ext-configure gd --with-freetype --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql mysqli zip mbstring \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy the PHP files to the Apache server's document root
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
