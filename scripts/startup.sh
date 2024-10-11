#!/bin/bash

until nc -z -v -w30 $DB_HOST $DB_PORT; do
   echo "Waiting for database connection..."
   sleep 5
done
echo "Database is up!"

php artisan migrate
php artisan serve --host=0.0.0.0 --port=80
