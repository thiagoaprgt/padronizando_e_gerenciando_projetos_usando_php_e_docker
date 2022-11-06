FROM php:8.1.12-fpm

ARG uid=1000
ARG user=thiagoaprgt

RUN apt-get update && apt-get install -y \

    git \
    curl \
    libpgn-dev \
    libonig-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

#criando um sistema de usuário para executar os comando do composer e do artisan

RUN useradd -G www-data, root -u $uid -d /home/$user $user

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Instalando o composer

COPY --from=composer:latest /usr/bin/composer

# Configurando working directory

WORKDIR /var/www/html

USER $user