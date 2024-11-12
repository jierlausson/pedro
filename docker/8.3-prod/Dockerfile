FROM ubuntu:22.04

ARG NODE_VERSION=20
ARG POSTGRES_VERSION=15

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor libcap2-bin libpng-dev python2 dnsutils librsvg2-bin fswatch ffmpeg nano  \
    && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu jammy main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.3-cli php8.3-dev \
      php8.3-pgsql php8.3-gd \
      php8.3-curl \
      php8.3-imap php8.3-mbstring \
      php8.3-xml php8.3-zip php8.3-bcmath \
      php8.3-intl php8.3-readline \
      php8.3-ldap \
      php8.3-msgpack php8.3-igbinary php8.3-redis php8.3-swoole \
      php8.3-memcached php8.3-pcov php8.3-imagick php8.3-xdebug \
      php8.3-fpm \
      nginx \
      supervisor \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" > /etc/apt/sources.list.d/nodesource.list \
    && apt-get update \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /etc/apt/keyrings/pgdg.gpg >/dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && apt-get update \
    && apt-get install -y postgresql-client-$POSTGRES_VERSION \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.3

COPY . /var/www/html
COPY docker/8.3-prod/start-container /usr/local/bin/start-container
COPY docker/8.3-prod/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/8.3-prod/php.ini /etc/php/8.2/cli/conf.d/99-sail.ini
COPY docker/8.3-prod/nginx.conf /etc/nginx/sites-enabled/default
RUN chmod +x /usr/local/bin/start-container

RUN chown -R www-data:www-data /var/www/html

# RUN composer install --optimize-autoloader --no-dev
RUN composer install --optimize-autoloader
RUN npm ci
RUN npm run build

EXPOSE 8000

ENTRYPOINT ["start-container"]
