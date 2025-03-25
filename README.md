## About this project

This is a blog-type application where I will share the things that I find interesting about what I'm doing with technology.

### Development setup

pre-requisites:
- install docker
- install [docker-mac-net-connect](https://github.com/chipmk/docker-mac-net-connect)
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

### Troubleshooting

When developing locally, I've noticed that connections being made via ingress can fail. Restarting `docker-mac-net-connect` and then restarting the tunnel for `minikube` has helped me:
```
sudo brew services restart docker-mac-net-connect
sudo minikube tunnel
```
