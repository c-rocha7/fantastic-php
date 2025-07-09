# Use a imagem oficial do PHP com FPM como base
FROM php:8.2-fpm-alpine

# Instala as dependências do sistema necessárias para compilar a extensão Redis
RUN apk add --no-cache $PHPIZE_DEPS

# Instala as extensões PHP
RUN pecl install redis && docker-php-ext-enable redis
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
