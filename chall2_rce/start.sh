docker build -t fun-php .
docker run -d -p 80:80 --rm fun-php