FROM python:3.11-slim

RUN apt-get update && apt-get install -y bash

WORKDIR /app
COPY requirements.txt requirements.txt
RUN pip install --no-cache-dir -r requirements.txt

COPY . .
RUN chmod +x init.sh
CMD ["./init.sh"]

EXPOSE 5000