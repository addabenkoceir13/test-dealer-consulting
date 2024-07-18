Hello 👋 Dealer Consulting
===============

Dealer Consulting Testing
=====================


## Technologies Used 
- Laravel v10
- PHP v8.2
- MySQL v8.1
- FilamentPHP v3

## Feature

- Authentication

- Admin Panel
     - User Management

- User Panel
    - Project Management
    - Task Management

## How To Use

### Download Repository
> clone repository
```bash
 git clone https://github.com/addabenkoceir13/test-dealer-consulting.git
```
> open folder
```bash
$ cd test-dealer-consulting
```
> Create file .env
```bash
$ cp .env.example .env.
```
> Generate Key Of .env
```bash
$ php artisan key:generate.
```

### Create DataBase && Migration && Seeding
> Create DataBase
```bash
$ CREATE DATABASE IF NOT EXISTS 'dealerconsulting'
```
> Go to file .env
```bash
DB_DATABASE=dealerconsulting
```
# Migration Table and seeder
```bash
$ php artisan migrate --seed

```

### How to use the application

#### Admin Panel
> Type in the URL below.

[http://testdealerconsulting.test/admin/login](http://testdealerconsulting.test/admin/login)

> Details for logging in

> email
```bash
admin@gmail.com
```
> passswoed
```bash
123456789
```
#### User Panel
> Type in the URL below.

[http://testdealerconsulting.test/user/login](http://testdealerconsulting.test/user/login)

> Details for logging in

> email
```bash
user01@gmail.com
```
> passswoed
```bash
123456789
```
