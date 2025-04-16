FROM php:8.2-apache-buster

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'app
COPY . /var/www/html/

# Créer la DB SQLite
RUN touch /var/www/html/database/database.sqlite

# Changer les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Activer mod_rewrite
RUN a2enmod rewrite

# Changer le répertoire racine Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Préparer Laravel (copier .env, composer install, artisan)
WORKDIR /var/www/html
RUN cp .env.example .env \
    && composer install --no-dev --optimize-autoloader \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan key:generate

# Lancer Apache
CMD ["apache2-foreground"]
