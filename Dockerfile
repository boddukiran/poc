FROM php:7.2.2-apache
#get the php with apache

# update apt-get with some installs
RUN apt-get update && \
    apt-get install -y git && \
    apt-get install -y curl

RUN curl -s https://getcomposer.org/installer | php

RUN mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html/

RUN git clone https://github.com/boddukiran/poc.git

WORKDIR /var/www/html/poc/

RUN composer install

EXPOSE 8000

CMD ["php", "artisan", "serve"]
