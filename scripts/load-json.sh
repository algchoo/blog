#!/bin/bash

set -e

jsonPath="/var/www/public/json"

for file in "$jsonPath"/*.json; do
    title=$(jq -r '.title' "$file") || { echo "Error parsing title in $file"; continue; }
    description=$(jq -r '.description' "$file") || { echo "Error parsing description in $file"; continue; }
    markdown=$(jq -r '.markdown' "$file") || { echo "Error parsing markdown in $file"; continue; }
    db="/var/www/database/database.sqlite"

    title=${title//\'/''}
    description=${description//\'/''}
    markdown=${markdown//\'/''}

    sqlite3 "$db" "insert into blog_posts (title, description, markdown, created_at, updated_at) values ('$title', '$description', '$markdown', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);"
done
