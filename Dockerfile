FROM php:8.2-apache

# Habilitar conexiones y reglas de URL
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

# Copiar archivos
COPY . /var/www/html/

# --- LA MAGIA ESTÁ AQUÍ ---
# Decirle a Apache que la carpeta principal es "public"
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Dar permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80