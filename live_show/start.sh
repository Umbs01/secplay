docker build -t live_show .
docker run -dit --rm -p 5000:5000 live_show