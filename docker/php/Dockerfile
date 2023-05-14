FROM php:8.1-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip libpng-dev wget ffmpeg python3\
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install gd \
    && pecl install redis \
    && docker-php-ext-enable redis

RUN wget https://github.com/yt-dlp/yt-dlp/releases/latest/download/yt-dlp -O /usr/local/bin/yt-dlp
RUN chmod a+rx /usr/local/bin/yt-dlp

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

WORKDIR /var/www/youtube-fr-dl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# User creation
ARG USER_NAME
ARG USER_GROUP_NAME
#user identification id
ARG UID
#group identification id
ARG GID

ENV USER_NAME=${USER_NAME}
ENV USER_GROUP_NAME=${USER_GROUP_NAME}
ENV UID=${UID}
ENV GID=${GID}

RUN groupadd --gid $GID $USER_GROUP_NAME \
  && useradd --uid $UID --gid $GID --shell /bin/bash --create-home $USER_NAME
USER $USER_NAME


