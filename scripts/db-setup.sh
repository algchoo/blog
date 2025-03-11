#!/bin/bash

set -e

php artisan session:table
php artisan migrate
php artisan migrate --path=database/migrations/2025_03_10_205029_blog_posts.php
