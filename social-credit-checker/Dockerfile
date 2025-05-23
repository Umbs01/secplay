FROM umbs01/apache-mysql

WORKDIR /app

COPY .env ./.env
COPY init.sql /docker-entrypoint-initdb.d/init.sql
COPY ./docker-entrypoint.sh ./docker-entrypoint.sh
RUN chmod +x ./docker-entrypoint.sh

WORKDIR /var/www/html
COPY src/ /var/www/html/

EXPOSE 80

CMD ["/app/docker-entrypoint.sh"]