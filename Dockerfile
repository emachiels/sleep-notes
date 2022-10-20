FROM php:8.1

RUN apt-get update && apt-get install -y \
    git \
    curl \
    supervisor \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    procps \
    # Clear cache
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    # Install PHP extensions
    && docker-php-ext-install pdo_mysql mbstring exif pcntl sockets \
    && pecl install swoole && docker-php-ext-enable swoole \
    && pecl install inotify && docker-php-ext-enable inotify \
    # Install node
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get update && apt-get install -y nodejs \
    # create user
    && useradd -ms /bin/bash www

# Install composer from the official image
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Copy required files
COPY --chown=www:www src /var/www
COPY docker/config/supervisor/supervisord.conf /etc/supervisor
RUN touch /var/log/supervisor/supervisord.log \
    && touch /var/run/supervisord.pid \
    && chown www:www /var/log/supervisor/supervisord.log \
    && chown www:www /var/run/supervisord.pid

COPY ./docker/start-container /usr/local/bin/start-container

RUN chmod +x /usr/local/bin/start-container

# Set working directory
WORKDIR /var/www

USER www

ENTRYPOINT ["sh", "/usr/local/bin/start-container"]
