# Hanasoft-Test

## Assignment#1

### Tech Stack
  - Docker
  - Laravel 8
  - PHP 7.4.24
  - Xdebug 3.0.4
  - Composer
  - Phpmyadmin
  - MySQL (used mariadb image since I have AMD Macbook)
  - Laravel `sanctum` for API authorization

### How to setup
 - Install `docker` and `docker-compose`
 - Install `git`
 - Clone the repository `Hanasoft-Test` and switch to the repository folder
 - Get current user id with *echo $UID*
 - Replace the __sohail__ and __501__ with your username and id in `docker-compose.yml` file 
 - Run `docker-compose up -d`
 - Site should be up on `localhost:8000`; if not Run `php artisan serve` and use the provide link (and verify)
 - Install `Postman` and login
 - Create an admin user and login 
 - *Copy the token value and replace it in the header with Authorization key*
    - Example Authorization: Bearer 'you-token-value'
  Please be advised, correct bearer token is required for all protected URLs
 - Link to Postman Collection: https://www.getpostman.com/collections/429699c677d0da3cb093
 - `?XDEBUG_SESSION_START=Xdebug` is added in the end of each request to connect to Xdebug server on the IDE.
  
