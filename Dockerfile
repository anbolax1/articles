# Используем базовый образ с PHP-FPM и Nginx
FROM php:8.1-fpm

# Обновляем пакеты и устанавливаем необходимые инструменты
RUN apt-get update && apt-get install -y \
    nginx \
    nano \
    libzip-dev \
    unzip

# Копируем конфигурацию Nginx
COPY ./docker/nginx/conf/default.conf /etc/nginx/nginx.conf

# Устанавливаем рабочую директорию
WORKDIR /app

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# Копируем файлы проекта
COPY . /app

#export env
COPY ./.env /app/.env

# Устанавливаем зависимости Composer
RUN composer update
RUN composer install

# Экспортируем порт 80
EXPOSE 80

# Запускаем Nginx и PHP-FPM
CMD service nginx start && php-fpm
