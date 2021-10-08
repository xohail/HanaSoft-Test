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
 - Make sure `Docker Desktop` is running
 - Stop other applications if `http://localhost` is occupied
 - Install `git`
 - Clone the repository `Hanasoft-Test`
 - Run `cd Hanasoft-Test/application`
 - Run `cp .env.example .env`
 - Copy and Replace in .env and save
    -  `DB_CONNECTION=mysql
       DB_HOST=mysql
       DB_PORT=3306
       DB_DATABASE=laraveldb
       DB_USERNAME=laravel
       DB_PASSWORD=laravelpassworddb`
 - Run `cd ..`
 - Get current user id by running `echo $UID`
 - Replace the __sohail__ and __501__ with your username and id in `docker-compose.yml` file
 - Run `cd nginx/conf.d`
 - Run `nano laravel.conf`
 - Copy into file and save
    - `server {
    listen 80;
    index index.php index.html;
    error_log  /var/log/nginx/error.log;
    access_log /var/log/nginx/access.log;
    root /var/www/application/public;
    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
    location / {
        try_files $uri $uri/ /index.php?$query_string;
        gzip_static on;
    }
}`  
 - Run `docker-compose up -d`
 - Run `docker exec -u root -it laravel /bin/bash`
 - Run `composer install`
 - Run `php artisan config:clear`
 - Run `php artisan cache:clear`
 - Run `php artisan migrate`
 - Run `php artisan key:generate`
 - Site should be up on `localhost:8000`
 - Install `Postman` and login
 - Link to Postman Collection: https://www.getpostman.com/collections/429699c677d0da3cb093
 - `?XDEBUG_SESSION_START=Xdebug` is added in the end of each request to connect to Xdebug server on the IDE.
 - Create an admin user and login 
 - *Copy the token value and replace it in the header with Authorization key*
    - Example Authorization: Bearer 'you-token-value'
  Please be advised, correct bearer token is required for all protected URLs that in assignment were meant to be only accessible to the ADMIN users
 Screenshots:
 <img width="1920" alt="Screen Shot 2021-10-08 at 2 36 48 pm (2)" src="https://user-images.githubusercontent.com/5494101/136494218-27297b82-bb88-43ef-b9ac-9303459c67c2.png">
<img width="1440" alt="Screen Shot 2021-10-08 at 2 37 37 pm" src="https://user-images.githubusercontent.com/5494101/136494274-c0982e7c-819e-4c98-ac70-d1673ed770e2.png">
<img width="1920" alt="Screen Shot 2021-10-08 at 2 37 37 pm (2)" src="https://user-images.githubusercontent.com/5494101/136494278-300e2518-1b5e-4430-b28c-cba640638307.png">
<img width="1440" alt="Screen Shot 2021-10-08 at 2 40 44 pm" src="https://user-images.githubusercontent.com/5494101/136494510-ca028216-a8d9-4ad1-9698-eb17b35f29a5.png">
<img width="1920" alt="Screen Shot 2021-10-08 at 2 40 44 pm (2)" src="https://user-images.githubusercontent.com/5494101/136494513-37bb5a55-f3db-4ea9-8e95-3cf6bbc5e252.png">























