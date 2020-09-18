# Qick Setup Guide
Run Below Commands

```sh
composer update
```
```sh
composer install
```
```sh
npm install
```
```sh
npm audit fix
```
```sh
npm run watch
```
Now Before Migration Create a Database named 'laravel' (For pre existing database drop 'users' table if any) then run
```sh
php artisan migrate
```
To Start The Laravel Server
```sh
php artisan serve
```
To Start the Express Server (optional)
```sh
nodemon ChatServer/index.js
```