FROM php:8.0-cli-alpine3.16

# Update the package index and install qrencode
RUN apk update && \
    apk add libqrencode && \
    rm -rf /var/cache/apk/*

# Add composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-scripts

COPY . .

EXPOSE 8000

ENTRYPOINT ["composer", "start"]
