# GoCarParts - Automotive Inventory & CRM Platform

## Overview

GoCarParts is a PHP + MySQL based automotive inventory platform designed for selling used engines and transmissions.

The platform supports:

* Vehicle inventory search
* Dynamic Year → Make → Model → Submodel filtering
* Product catalog
* User registration and authentication
* Shopping cart
* Checkout workflow
* Order management
* Customer accounts
* Quote request system
* Employee CRM dashboard
* Lead management
* Task assignment system
* Admin panel

---

# Technology Stack

## Backend

* PHP 8+
* MySQL / MariaDB
* Apache (XAMPP)

## Frontend

* HTML5
* CSS3
* JavaScript
* Bootstrap

## Database

* MySQL

## Version Control

* Git
* GitHub

---

# Project Structure

```text
gocarparts-main/
│
├── api/
│   ├── get-years.php
│   ├── get-makes.php
│   ├── get-models.php
│   ├── get-submodels.php
│   └── search-debug.php
│
├── assets/
│
├── includes/
│   ├── auth.php
│   ├── config.php
│   ├── db_connect.php
│   └── ...
│
├── razorpay-php-master/
│
├── index.php
├── shop-list.php
├── product-details.php
├── cart.php
├── checkout.php
├── my-account.php
├── order-details.php
├── loginpage.php
├── register.php
├── login.php
├── logout.php
│
└── ...
```

---

# Features Implemented

## Inventory Search System

Dynamic cascading dropdowns:

```text
Category
   ↓
Year
   ↓
Make
   ↓
Model
   ↓
Submodel
```

Powered by:

* api/get-years.php
* api/get-makes.php
* api/get-models.php
* api/get-submodels.php

---

## Product Catalog

Supports:

* Engines
* Transmissions

Product cards display:

* Vehicle information
* Mileage
* SKU
* Warranty information
* Shipping information
* Price / Call For Price

---

## Authentication System

Supports:

### User Registration

Stored in:

```sql
users
```

Fields:

```text
id
name
username
email
password
role
```

Password storage:

```php
password_hash()
password_verify()
```

---

### Login

Session variables:

```php
$_SESSION['user_id']
$_SESSION['username']
$_SESSION['role']
```

---

### Logout

Session cleanup:

```php
session_destroy()
```

---

# Session Architecture

Centralized in:

```text
includes/auth.php
```

Important functions:

```php
ensureSession()

isLoggedIn()

getUserId()

getUserRole()

requireLogin()

requireRole()
```

Do NOT use raw:

```php
session_start()
```

in new files.

Always use:

```php
require_once 'includes/auth.php';

ensureSession();
```

---

# Shopping Cart

Database table:

```sql
cart
```

Features:

* Add to cart
* Update quantity
* Remove item
* Cart totals
* Authentication checks

Files:

```text
add-to-cart.php
fetch-cart.php
get-cart.php
cart.php
```

---

# Checkout System

Files:

```text
checkout.php
update-order-items.php
```

Supports:

* Billing details
* Shipping details
* Order creation

---

# Orders System

Tables:

```sql
orders
order_items
```

Order History:

```text
my-account.php
```

Order Details:

```text
order-details.php
```

---

# CRM System

Employee Features:

* Lead management
* Task management
* Customer follow-up

Files:

```text
emp_leads.php
my_tasks.php
assign_task.php
reassign_task_admin.php
```

---

# Database Requirements

Required database:

```sql
u537919873_8tqun_real
```

---

# Required Tables

Minimum tables:

```text
users
products
cart
orders
order_items
quote_requests
get_custom_quote
```

---

# Local Development Setup

## Option 1 (Recommended)

Install XAMPP

Download:

https://www.apachefriends.org

Install:

* Apache
* MySQL
* PHP

---

## Clone Repository

```bash
git clone https://github.com/CH-JASWANTH-KUMAR/gocarparts-main.git
```

Move project to:

```text
xampp/htdocs/
```

Example:

```text
C:\xampp\htdocs\gocarparts-main
```

---

# Database Setup

Create database:

```sql
CREATE DATABASE u537919873_8tqun_real;
```

Import:

```text
database.sql
```

using:

```text
phpMyAdmin
```

or

```bash
mysql -u root -p u537919873_8tqun_real < database.sql
```

---

# Configuration

File:

```text
includes/config.php
```

Example:

```php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'u537919873_8tqun_real');
```

---

# Environment Variables

Create:

```text
.env
```

Example:

```env
APP_ENV=development

APP_BASE_URL=http://localhost

RAZORPAY_KEY_ID=
RAZORPAY_KEY_SECRET=
```

---

# Running the Project

Start:

```text
Apache
MySQL
```

Open browser:

```text
http://localhost/gocarparts-main
```

---

# Common Issues

## Database Connection Error

Check:

```php
includes/config.php
```

Verify:

```text
Database exists
Username correct
Password correct
```

---

## Login Not Working

Check:

```text
users table
```

Verify:

```php
password_verify()
```

is being used.

---

## Cart Empty

Verify:

```text
cart table
```

contains rows for:

```text
current user_id
```

---

## Images Not Showing

Product images are stored in:

```sql
products.image
```

Some products may use placeholders.

---

## Session Warnings

Never use:

```php
session_start();
```

directly.

Use:

```php
ensureSession();
```

---

# Git Workflow

Pull latest changes:

```bash
git pull origin main
```

Create branch:

```bash
git checkout -b feature-name
```

Commit:

```bash
git add .
git commit -m "Your message"
```

Push:

```bash
git push origin feature-name
```

---

# Security Notes

Never commit:

```text
.env
.env.local
```

Never commit:

```text
Production passwords
API secrets
Payment keys
```

Always keep them in:

```text
Environment Variables
```

---

# Deployment Checklist

Before deployment:

* Database imported
* Config updated
* Apache running
* MySQL running
* Session system verified
* Login verified
* Cart verified
* Checkout verified
* Orders verified

---

# Maintainers

Project Repository:

https://github.com/CH-JASWANTH-KUMAR/gocarparts-main

Primary Developer:

CH JASWANTH KUMAR

---

# Future Improvements

* Full image ingestion pipeline
* Advanced search filters
* Real pricing engine
* Payment gateway integration
* Inventory sync automation
* Email notifications
* SMS notifications
* Admin analytics dashboard
* REST API
* Docker deployment
* CI/CD pipeline
