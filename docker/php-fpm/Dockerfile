FROM php:8.2-fpm-alpine

# 必要なパッケージインストール
RUN apk add --no-cache \
  bash \
  git \
  unzip \
  libzip-dev \
  oniguruma-dev \
  curl \
  && docker-php-ext-install pdo_mysql zip mbstring

# Composerインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/app

# ソースをコピー
COPY . .

# Composerインストール
RUN composer install

# アプリケーションキー生成
RUN php artisan key:generate

# 権限設定
RUN chown -R www-data:www-data /var/www/app/storage /var/www/app/bootstrap/cache
RUN chmod -R 775 /var/www/app/storage /var/www/app/bootstrap/cache

COPY docker/php-fpm/php.ini /usr/local/etc/php/php.ini

# php-fpm起動
CMD ["php-fpm"]
