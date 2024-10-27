FROM php:7.2-apache

COPY src/ /var/www/html/

RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the index.php file to the container
COPY index.php .
