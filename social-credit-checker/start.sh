docker build -t social-credit-checker .
docker run -d -p 8000:80 --rm social-credit-checker