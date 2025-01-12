FROM algchoo/dumpster:blog-dev-0.0.9 AS builder

FROM nginx:alpine

WORKDIR /var/www

COPY --from=builder /var/www/public/ /var/www/public/
