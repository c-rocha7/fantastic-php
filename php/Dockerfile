# Use a imagem oficial do PHP com FPM como base
FROM php:8.2-fpm-alpine

# Instala as extensões PHP necessárias para conectar com o MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
