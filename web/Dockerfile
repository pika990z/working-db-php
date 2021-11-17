FROM php:7.4.3-apache
COPY . /
RUN chmod -R 777 /var
RUN docker-php-ext-install mysqli pdo pdo_mysql