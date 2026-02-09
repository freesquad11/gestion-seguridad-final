FROM php:8.2-apache

# Instalar extensiones y activar mod_rewrite (para que funcionen los enlaces)
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

# Copiar todo el código
COPY . /var/www/html/

# Configurar Apache para que la carpeta "public" sea la principal
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Dar permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80