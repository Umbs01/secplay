docker build -t socredit:latest .
docker run -d -p 8000:80 --rm socredit:latest