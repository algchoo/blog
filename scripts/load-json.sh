#!/bin/bash

jsonPath="/var/www/public/json"

for file in $jsonPath/*.json; do
    json=$(cat $file)

    curl -X POST http://upload-md-service:8080/posts \
        -H "Content-Type: application/json" \
        -d "$json"

    sleep 1
done
