#!/bin/bash
set -e
export $(cat /app/.env | xargs)

env | grep DB
service mysql start

echo "Waiting for MySQL to be ready..."
until mysqladmin ping -u"$DB_USERNAME" --silent; do
    sleep 2
done
echo "Done"

mysql -u"$DB_USERNAME" -p"$DB_PASSWORD" < /docker-entrypoint-initdb.d/init.sql

echo "Database initialized"

exec apache2-foreground