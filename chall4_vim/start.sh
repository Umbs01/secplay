#!/bin/bash
docker build -t vim101 .
docker run -p8000:8080 vim101