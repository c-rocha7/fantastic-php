# Imagem oficial do PHP com FPM-Alpine
FROM php:8.2-fpm-alpine

# Instala as dependências do sistema necessárias para as extensões
RUN apk add --no-cache $PHPIZE_DEPS postgresql-dev

# Instala as extensões PHP
RUN pecl install redis && docker-php-ext-enable redis
RUN docker-php-ext-install pdo_mysql pdo_pgsql && docker-php-ext-enable pdo_mysql pdo_pgsql
