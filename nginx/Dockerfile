FROM algchoo/dumpster:blog-dev-0.1.0 AS builder

FROM nginx:alpine

WORKDIR /var/www

COPY --from=builder /var/www/public/ /var/www/public/
