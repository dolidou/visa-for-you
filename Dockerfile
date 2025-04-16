FROM php:8.2-apache-buster

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet
COPY . /var/www/html/

# Installer les dépendances Laravel
RUN cd /var/www/html && composer install --no-dev --optimize-autoloader

# Changer le propriétaire des fichiers
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Créer le répertoire public et activer mod_rewrite
RUN mkdir -p /var/www/html/public && a2enmod rewrite

# Configuration Apache pour Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Lancer Apache
CMD ["apache2-foreground"]
