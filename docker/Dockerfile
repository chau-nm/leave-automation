FROM node:25 AS node

FROM dunglas/frankenphp AS franken

COPY --from=node /usr/local /usr/local

WORKDIR /app

RUN install-php-extensions \
    pcntl \
    pdo_pgsql \
    pgsql

COPY . /app
RUN chmod +x /app/docker/start-dev.sh

RUN npm run build

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
