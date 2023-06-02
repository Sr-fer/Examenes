FROM php:7.4-apache

RUN a2enmod rewrite

WORKDIR /var/www/html

RUN apt-get update

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

COPY src/ ./

COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data ./
RUN chmod -R 755 ./

EXPOSE 80

CMD ["apache2-foreground"]