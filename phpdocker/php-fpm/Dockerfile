FROM phpdockerio/php:8.3-fpm
WORKDIR "/application"

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        git \ 
        php8.3-bcmath \ 
        php8.3-decimal \ 
        php8.3-gnupg \ 
        php8.3-mcrypt \
        mc \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \

