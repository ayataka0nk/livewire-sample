##################
# ベースステージ
##################
FROM php:8.3-apache AS base

# システムの依存関係をインストール
RUN apt-get update && apt-get install -y \
    libxml2-dev \
    libpng-dev \
    libpq-dev \
    zlib1g-dev \
    unzip \
    libonig-dev \
    supervisor \
    sudo

# PHP拡張機能をインストール
RUN docker-php-ext-install \
    mbstring \
    gd \
    iconv \
    dom \
    bcmath \
    pdo_pgsql \
    pgsql

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Apacheモジュールを有効化
RUN a2enmod rewrite headers

# Composerをインストール
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Apache設定をコピー
COPY ./docker/php/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf

# エントリーポイントスクリプトをコピー
COPY ./docker/php/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

##################
# 開発環境
##################
FROM base AS development

# Supervisor設定をコピー
COPY ./docker/development/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

ARG WWWUSER
ARG WWWGROUP
RUN addgroup --gid $WWWGROUP mygroup
RUN adduser --uid $WWWUSER --ingroup mygroup myuser
RUN usermod -aG sudo myuser
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers
USER myuser
ENV WORKER_USER=myuser
ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]

##################
# 本番環境
##################
FROM base AS production
# Supervisor設定をコピー
COPY ./docker/production/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf
# アプリケーションファイルをコピー
COPY . /var/www/html
# 作業ディレクトリを設定
WORKDIR /var/www/html
# Composerの依存関係をインストール
RUN composer install --no-dev --optimize-autoloader
RUN npm run build
# 権限を設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage
# 本番環境用の.envファイルをコピー
COPY .env.production /var/www/html/.env
# Laravelのキャッシュを生成
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache
ENV WORKER_USER=www-data
EXPOSE 80
ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
