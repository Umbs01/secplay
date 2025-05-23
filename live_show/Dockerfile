FROM python:3.11-slim

COPY flag.txt /opt/flag.txt

WORKDIR /app
COPY requirements.txt requirements.txt
RUN pip install --no-cache-dir -r requirements.txt

COPY . .
CMD ["python3", "app.py"]

EXPOSE 5000