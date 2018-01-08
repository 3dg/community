FROM php:fpm-alpine
RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) pdo_mysql
# https://github.com/docker-library/php/issues/225#issuecomment-226870896
RUN apk add --no-cache freetype-dev libpng-dev libjpeg-turbo-dev
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) gd

# owner
# https://github.com/docker-library/php/blob/master/7.2/alpine3.7/fpm/Dockerfile#L29-L31
# COPY --chown=www-data:www-data . /var/www/html
# COPY . /var/www/html
# RUN chmod 777 .
RUN apk add --no-cache rsync

VOLUME /var/www/html
COPY . /code
ENTRYPOINT ["/code/docker-entrypoint.sh"]
