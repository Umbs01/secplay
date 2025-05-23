#!/bin/bash
set -e

service mysql start
exec apache2-foreground
