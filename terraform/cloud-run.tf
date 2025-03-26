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
    containers {
      name = "blog"
      image = "ghcr.io/algchoo/blog:0739f4e"
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
      image = "ghcr.io/algchoo/nginx:0739f4e"
      depends_on = ["blog"]
      resources {
        limits = {
          cpu    = "2"
          memory = "1024Mi"
        }
      }
    }
  }
}

resource "google_secret_manager_secret_iam_member" "secret_access" {
  secret_id = data.google_secret_manager_secret_version.blog_app_key.secret
  role      = "roles/secretmanager.secretAccessor"
  member    = "serviceAccount:${google_cloud_run_v2_service.default.template.0.service_account}"
}
