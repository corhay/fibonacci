# Use an official PHP image
FROM php:8.2-apache

# Copy application code
WORKDIR /var/www/html
COPY ../server/ .

# Set file permissions
RUN chown -R www-data:www-data /var/www/html

# Expose the PHP port
EXPOSE 80
