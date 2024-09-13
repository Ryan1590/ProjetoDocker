FROM php:apache

# Instalar a extensão mysqli
RUN docker-php-ext-install mysqli

# Configurações do Apache (opcional)
RUN a2enmod rewrite

# Definir permissões (se necessário)
RUN chown -R www-data:www-data /var/www/html

# Expor a porta
EXPOSE 80
