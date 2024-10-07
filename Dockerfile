# Gunakan base image PHP dengan Apache
FROM php:8.0-apache

# Set work directory in container
WORKDIR /var/www/html

# Copy file project ke dalam direktori kerja di container
COPY . /var/www/html/ # Menyalin semua file dari root

# Set permission yang tepat untuk direktori
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Install dependencies jika diperlukan
# Misalnya, untuk menginstall mysqli
RUN docker-php-ext-install mysqli

# Expose port 80 untuk mengakses aplikasi
EXPOSE 80

# Jalankan Apache server
CMD ["apache2-foreground"]
