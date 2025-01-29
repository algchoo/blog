#!/bin/bash

markdownPath="/var/www/public/markdown"

for markdown in $markdownPath/*.md; do
    content=$(cat $markdown | sed "s/'/''/g")

    psql -U blog_admin -d blog_posts -h postgres-service -c "
    INSERT INTO blog_posts (title, description, markdown, created_at, updated_at)
    VALUES ('An actual post', 'will fix duplicate titles', '$content', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
    "
done
