#!/bin/bash
set -e

service mysql start

until mysqladmin ping -uroot --silent; do
    sleep 2
done

echo "CREATE USER '$DB_USERNAME'@'$DB_SERVER' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON *.* TO '$DB_USERNAME'@'$DB_SERVER';
FLUSH PRIVILEGES;" >> /docker-entrypoint-initdb.d/init.sql

echo "CREATE TABLE flags (flag VARCHAR(100));
INSERT INTO flags (flag) VALUES ('$FLAG');" >> /docker-entrypoint-initdb.d/init.sql

mysql < /docker-entrypoint-initdb.d/init.sql

apache2-foreground