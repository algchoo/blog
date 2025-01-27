## About this project

This is a blog-type application where I will share the things that I find interesting about what I'm doing with technology.

I do this for knowledge and joy.

### Development setup

pre-requisites:
- install docker
- install minikube
- update `/etc/hosts` to include (run `minikube ip` to get ip)
```
minikube-ip 	app.local
```

1. Start `minikube` with ingress addon
```
minikube start --addons=ingress
```

2. Deploy the secrets to the cluster
3. In another terminal, run:
```
sudo minikube tunnel
```

4. Deploy the application, in the project folder, run:
```
kubectl apply -k kubernetes/dev
```

To seed the database, do the following (will make this easier):
```
kubectl exec -it <blog-container> -- bash
```
after you exec into the php/laravel container, run the following:
```
composer install
php artisan migrate --path=database/migrations/BlogPostMigrations.php
php artisan db:seed --class=BlogPostsSeeder
```
this will seed the database with some goofy data for testing how things might look.
