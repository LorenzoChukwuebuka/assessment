# Set the base image for subsequent instructions
FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    netcat-traditional \
    curl \
    unzip \
    git \
    default-mysql-client \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Remove default server definition
RUN rm -rf /var/www/html

# Copy application source
COPY . /var/www

# Set permissions
RUN chown -R www-data.www-data /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/www/storage

# Install PHP dependencies
RUN composer install --no-interaction --no-scripts --no-autoloader

# Generate optimized autoloader
RUN composer dump-autoload --optimize

# Copy entrypoint script into container
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh

# Make the script executable
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Set the entrypoint
ENTRYPOINT ["docker-entrypoint.sh"]

# Expose port for php-fpm
EXPOSE 9000
