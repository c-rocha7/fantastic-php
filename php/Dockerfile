# Use a imagem oficial do PHP com Apache como base
FROM php:8.2-apache

# Instala as extensões PHP necessárias para conectar com o MySQL
# mysqli, pdo, e pdo_mysql são as mais comuns para esta finalidade
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
