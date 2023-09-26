FROM php:7.4-apache
RUN apt-get update && apt-get upgrade -y && apt-get install -y zlib1g-dev

COPY keys/server.pem /etc/apache2/ssl/server.pem
COPY keys/server.key /etc/apache2/ssl/server.key
COPY keys/origin_ca_rsa_root.pem /etc/apache2/ssl/origin_ca_rsa_root.pem
COPY keys/dev.conf /etc/apache2/sites-enabled/dev.conf
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite
RUN a2enmod ssl && a2enmod socache_shmcb


