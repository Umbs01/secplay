docker build -t apache-mysql:latest .
docker run -d -p 8000:80 apache-mysql:latest
