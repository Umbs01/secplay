#!/bin/bash
set -e

service mysql start

echo "CREATE TABLE flags (flag VARCHAR(100));
INSERT INTO flags (flag) VALUES ('$FLAG');" >> /docker-entrypoint-initdb.d/init.sql

echo "DROP USER IF EXISTS '$DB_USERNAME'@localhost;
CREATE USER '$DB_USERNAME'@'$DB_SERVER' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON *.* TO '$DB_USERNAME'@'$DB_SERVER';
FLUSH PRIVILEGES;" >> /docker-entrypoint-initdb.d/init.sql

until mysqladmin ping -uroot --silent; do
    sleep 2
done

mysql < /docker-entrypoint-initdb.d/init.sql

apache2-foreground