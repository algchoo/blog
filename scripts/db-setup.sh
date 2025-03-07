#!/bin/bash

set -e

php artisan session:table
php artisan migrate
php artisan migrate --path=database/migrations/BlogPostMigration.php
