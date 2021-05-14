# Ingatlanosthing

This is a simple application made in laravel, for managing real estates.


## Dependencies
PHP 7.3-8.0

MSSQL

## Installation
You will need composer to install the dependencies automatically.Also you need to set up your own .env file, you can do that using the included .env.example or create your own.

Run
```
composer install
```

After successfully installing the dependencies, start mssql server, then use the migrate command to load the tables and data into your sql server.

```
php artisan migrate
```
Run it with
```
php artisan serve
```
