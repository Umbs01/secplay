FROM php:5.6.40-apache

RUN echo "deb http://archive.debian.org/debian stretch main" > /etc/apt/sources.list && \
    echo "deb http://archive.debian.org/debian-security stretch/updates main" >> /etc/apt/sources.list && \
    echo 'Acquire::Check-Valid-Until "0";' > /etc/apt/apt.conf.d/99no-check-valid-until && \
    echo 'APT::Get::AllowUnauthenticated "true";' > /etc/apt/apt.conf.d/99allow-unauth

RUN apt-get update && apt-get install -y \
    wget \
    lsb-release \
    gnupg \
    mysql-server \
    default-libmysqlclient-dev && docker-php-ext-install mysqli mysql

COPY init.sql /docker-entrypoint-initdb.d/init.sql

WORKDIR /app
COPY ./init.sh ./init.sh
RUN chmod +x ./init.sh

WORKDIR /var/www/html
COPY src/ /var/www/html/

EXPOSE 80

CMD ["/app/init.sh"]