terraform {
  backend "gcs" {
    bucket = "blog-tf-state"
    prefix = "terraform/state"  
  }
}

provider "google" {
    project = "dumpster-blog"
    region = "us-central1"
    zone = "us-central1-c"
}

data "google_secret_manager_secret_version" "blog_app_key" {
  secret  = "blog_app_key"
  version = "latest"
}

resource "google_cloud_run_v2_service" "default" {
  name     = "cloudrun-service"
  location = "us-central1"
  deletion_protection = false
  ingress = "INGRESS_TRAFFIC_ALL"

  template {
    service_account = "cloud-run-deploy@dumpster-blog.iam.gserviceaccount.com"
    containers {
      name = "blog"
      image = "us-east1-docker.pkg.dev/dumpster-blog/blog-images/blog:b1b9066"
      env {
        name = "APP_KEY"
        value_source {
          secret_key_ref {
            secret = data.google_secret_manager_secret_version.blog_app_key.secret
            version = "latest"
          }
        }
      }
      resources {
        limits = {
          cpu    = "2"
          memory = "1024Mi"
        }
      }
    }
    containers {
      name = "nginx"
      image = "us-east1-docker.pkg.dev/dumpster-blog/blog-images/nginx:3442b8c"
      resources {
        limits = {
          cpu    = "2"
          memory = "1024Mi"
        }
      }
      ports {
        container_port = 80
      }
    }
  }
}

resource "google_secret_manager_secret_iam_member" "secret_access" {
  secret_id = data.google_secret_manager_secret_version.blog_app_key.secret
  role      = "roles/secretmanager.secretAccessor"
  member    = "serviceAccount:cloud-run-deploy@dumpster-blog.iam.gserviceaccount.com"
}
