# Use the official PHP Apache image
FROM php:8.1-apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Copy the PHP file to the Apache server's document root
COPY index.php /var/www/html/

# Expose port 80
EXPOSE 80
