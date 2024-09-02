FROM php:8.3-cli

RUN groupadd -g 1002 app && \
    useradd -u 1002 -g app -m app

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN install-php-extensions zip

WORKDIR /app

RUN chown -R app:app /app

USER app

CMD [ "bash" ]