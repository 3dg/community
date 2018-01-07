#!/bin/sh
rsync -crv --del --exclude-from=/code/.dockerignore /code/ .
chown -R www-data:www-data .
docker-php-entrypoint php-fpm
