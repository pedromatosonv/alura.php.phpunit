FROM php:8.3-cli

RUN groupadd -g 1002 app && \
    useradd -u 1002 -g app -m app

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

RUN chown -R app:app /app

USER app

CMD [ "bash" ]