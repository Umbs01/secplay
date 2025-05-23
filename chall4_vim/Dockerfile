FROM debian:10-slim

COPY ./flag.txt /opt/flag.txt

WORKDIR /challenge

COPY ./gotty_linux_amd64.tar.gz ./gotty_linux_amd64.tar.gz
COPY ./welcome.txt ./welcome.txt

RUN tar -xzf gotty_linux_amd64.tar.gz && rm -rf gotty_linux_amd64.tar.gz
RUN chmod +x ./gotty

RUN apt-get update && apt-get install -y vim && apt-get clean

RUN useradd -m player
USER player

CMD [ "./gotty", "-w", "vim", "welcome.txt" ]
# expose port 8080