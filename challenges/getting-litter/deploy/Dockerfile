FROM ubuntu:18.04
RUN useradd --create-home appuser
WORKDIR /home/appuser
USER appuser

FROM php:7.0-apache
COPY *.php /var/www/html/
COPY *.jpg /var/www/html/
COPY *.png /var/www/html/
COPY *.css /var/www/html/