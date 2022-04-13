# Test
## About Test

This is a web application framework with expressive, elegant syntax. 

# Repository

- CMS back-end
- clone the repository

  ` gh repo clone moreschifio17/test-app`

# Tecnologies

- Laravel 9.xx.xx
- PHP 8.x
- Composer 2.2.xx
- MariaDB 10.XX.XX

# Data base

```
mysql -u root -p
```

## Create data base

```
CREATE DATABASE prueba CHARACTER SET utf8 COLLATE utf8_general_ci;
exit
```

## Configure data base

```
cp .env.example .env
```

Change variables .env

```
APP_PORT=3000
    
DB_HOST=localhost
DB_NAME=prueba
DB_USER=prueba
DB_PASSWORD="xxxxxxxx"
```

## Migration

```
php artisan migrate
```

# Development

## Server

Development local server

```
php artisan serve
```
## Swagger 

```
1. composer require "darkaonline/l5-swagger"
```
2. open your config/app.php and add this line: 
```
L5Swagger\L5SwaggerServiceProvider::class

3. php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
```
4. Connect Database.
```
5. php artisan migrate:fresh --seed
```