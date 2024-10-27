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

    # Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy the PHP files to the Apache server's document root
COPY . /var/www/html/

# Set permissions for the WordPress directory
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

CMD ["bash", "-c", "if [ ! -f /var/www/html/wp-config.php ]; then \
    if [ ! -d /var/www/html/wp-includes ]; then \
        wp core download --path=/var/www/html --allow-root; \
    fi; \
    wp config create --dbname=$DB_NAME --dbuser=$DB_USER --dbpass=$DB_PASSWORD --dbhost=$DB_HOST --path=/var/www/html --allow-root; \
fi && apache2-foreground"]
