FROM php:8-apache

USER root

RUN apt-get update -y && apt-get install -y openssl curl zip unzip git nano

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql
#RUN docker-php-ext-install a2emod rewrite

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /app && a2enmod rewrite

RUN rm -rf /var/www/html && ln -s /app /var/www/html

RUN composer install

# Run Laravel commands
RUN php artisan optimize:clear
RUN php artisan config:clear
RUN php artisan config:cache
RUN php artisan route:clear

CMD php artisan serve --host=0.0.0.0 --port=8000

#EXPOSE 8181
EXPOSE 8000
