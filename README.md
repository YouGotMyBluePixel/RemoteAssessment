


## Resource Management System

## Dependencies

- PHP (at least 5.6)
- PHP GD, XML, SOAP, MYSQL & mbstring extensions
- [Composer](getcomposer.org)
- [Node.js](https://nodejs.org)
- NPM
- Xampp
- MySQL

## Setting up

- Copy `.env.example` to `.env`
- Modify values in `.env` if needed

### Run the following
- `$ git checkout main`
- `$ git pull`
- `$ php artisan key:generate`
- `$ npm install`
- `$ composer install`

Initialize database

```php
php artisan migrate 
```

Start the project:

```php
php artisan serve
npm run watch
```