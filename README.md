# Hanasoft-Test

## Assignment#1

### Tech Stack
  - Docker
  - Laravel 8
  - PHP 7.4.24
  - Xdebug 3.0.4
  - Composer
  - Phpmyadmin
  - MySQL

### How to setup
 - Install `docker` and `docker-compose`
 - Install `git`
 - Clone the repository `Hanasoft-Test` and switch to the repository folder
 - Get current user id with *echo $UID*
 - Replace the user and id in `docker-compose.yml` file with sohail and 501
 - Run `docker-compose up -d`
 - Site should be up on `localhost:8000`; if not Run `php artisan serve` and use the provide link (and verify)
 - Install `Postman` and login
 - Create an admin user and login 
 - *Copy the token value and replace it in the header with Authorization key*
    - Example Authorization: Bearer 'you-token-value'
  Please be advised, correct bearer token is required for all protected URLs
https://www.getpostman.com/collections/429699c677d0da3cb093
  
