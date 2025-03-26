FROM nginx:stable-alpine

RUN apk update && apk add --upgrade libxml2 libxslt libexpat

COPY nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www

COPY ../public ./public
