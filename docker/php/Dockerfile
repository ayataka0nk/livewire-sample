FROM php:8.3-apache

ARG WWWUSER
ARG WWWGROUP

RUN apt-get update \
    && apt-get install -y libxml2-dev libpng-dev libpq-dev zlib1g-dev unzip libonig-dev supervisor sudo \
    && docker-php-ext-install pdo_mysql mysqli mbstring gd iconv dom bcmath pdo_pgsql pgsql
RUN a2enmod rewrite
RUN a2enmod headers

# Install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

COPY /sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY /laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

COPY entrypoint.sh /usr/local/bin/
RUN chmod 777 /usr/local/bin/entrypoint.sh

# 実行ユーザの作成
RUN addgroup --gid $WWWGROUP mygroup
RUN adduser --uid $WWWUSER --ingroup mygroup myuser
RUN usermod -aG sudo myuser
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers
USER myuser

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
