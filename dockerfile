FROM php:8.2-fpm-alpine

# Instala las dependencias del sistema necesarias
RUN apk add --no-cache \
    git \
    curl \
    zip \
    unzip \
    mysql-client \
    npm \
    libxml2-dev \
    libpng-dev \
    jpeg-dev \
    libzip-dev \
    supervisor \
    bash \
    icu-dev

# Instala las extensiones de PHP
RUN docker-php-ext-install pdo pdo_mysql opcache exif gd intl zip bcmath

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Crea un usuario sin privilegios para mayor seguridad
RUN adduser -D -u 1000 appuser

# Cambia el directorio de trabajo y los permisos
WORKDIR /var/www/html
RUN chown -R appuser:appuser /var/www/html

# Cambia al usuario sin privilegios
USER appuser

CMD ["php-fpm"]
