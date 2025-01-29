#!/bin/bash

jsonPath="/var/www/public/json"

for file in $jsonPath/*.md; do
    json=$(cat $file)

    curl -X POST http://upload-service:8080/posts \
        -H "Content-Type: application/json" \
        -d "$json"

    sleep 1
done
