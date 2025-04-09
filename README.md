# Multi-Tenant Blog System

A Laravel-based multi-tenant blog system with admin approval flow, Web/API post management, and role-based access.

---

## IMPORTANT
DB can Be Copied and Imported from a File Named multi_tenant_blog.sql on The Root  Folder.

# Concept

This Is A laravel Based multi-tenant blog system, The web flow of this app is multi faceted in the sense that it has a dashboard for both the Admin and Tenants(users), at the web flow each tenant can only access their own posts and they can only perform CRUD Operations on their own Posts Only, But at the web flow, Admins can access and perform CRUD Operation on All Tenant(users) Post, This Was enforced through the aid of Laravel Policies. Admins can approve a registered user and add them as a tenant after approval. Admin can also Deactivate/Activate and Delete Tenants(users) account.

At The API Flow, Tenants can perform CRUD Operations only on their Own Post and Admins Can Also Manage Tenant's Posts. This Was Enforced using the aid of laravel policies.


# General Login Credentials
## Users Login and Password
Login: user5@gmail.com Password: password
Login: user6@gmail.com Password: password

## Admin Login and Password
Login: admin@gmail.com Password: password
### NOTE-> Every password must be in lowercase.



## 🚀 Features

- Multi-tenancy with admin approval
- Super-admin panel to manage tenants and users
- Tenants can manage blog posts (Web & API)
- RESTful API using Laravel Sanctum
- Follows SOLID principles and Laravel best practices

---

## 🛠️ Tech Stack

- Laravel 12
- Vue.Js
- Blade
- Laravel Sanctum
- MySQL
- Postman

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
## git clone https://github.com/your-username/your-project.git
cd your-project

## Environment Setup:
cp .env.example .env
php artisan key:generate

## Import the DB from multi_tanant_blog.sql file on the folder structure

## Migrate and Seed Database:
php artisan migrate --seed

## Run the App:
php artisan serve

## Login With Credentials as follows:
 ADMIN LOGIN: Email: admin@gmail.com, Password: password
TENANT LOGIN: Email: user5@gmail.com, Password: password ('password should be in lowercase');

## API Documentation::

## API ENDPOINTS:
## LOGIN:
POST /api/login:
BODY For A Tenant:
{
  "email": "user5@gmail.com",
  "password": "password"
}

BODY For An Admin:
{
  "email": "user5@gmail.com",
  "password": "password"
}

RESPONSE:
{
  "token": "YOUR_ACCESS_TOKEN"
}

### Posts (Tenant Only)
## Get All Posts That Belongs To The Logged In Tenant:

GET /api/showAll


## Search For A specific Post That Belongs To The Logged In Tenant:

GET /api/show/{post}

## Create Post
POST /api/create

BODY
{
  "title": "My Post",
  "content": "Post body"
}

## UPDATE POST
PUT /api/update/{id}


### DELETE POST
DELETE /api/delete/{id}


### Posts (Admins Only)

## Get All The Posts That Belongs To Every Tenant:

GET /api/showAll


## Search For A specific Post:

GET /api/show/{post}


### ADMIN CAN DELETE POST DELETE POST
DELETE /api/delete/{id}










