FROM php:8.2-apache

COPY src/ /var/www/html/

COPY flag.txt /opt/flag.txt

RUN chown -R www-data:www-data /var/www/html

COPY ./apache2.conf /etc/apache2/apache2.conf

USER www-data

EXPOSE 80