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
  - Laravel with `sanctum` authorization for API authorization

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
 - Run `mkdir -p nginx/conf.d && cd nginx/conf.d`
 - Run `touch laravel.conf`
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
    - Please be advised, correct bearer token is required for all protected URLs that in assignment were meant to be only accessible to the ADMIN users
 
 - Screenshots:

![Screen Shot 2021-10-08 at 3 01 53 pm](https://user-images.githubusercontent.com/5494101/136496607-18c7dfe7-ef6b-421a-a7b1-191f2b7bd72b.png)
![Screen Shot 2021-10-08 at 3 01 58 pm](https://user-images.githubusercontent.com/5494101/136496614-87f59ed0-2b5c-41a5-8566-ed62ff4b6192.png)
![Screen Shot 2021-10-08 at 3 02 01 pm](https://user-images.githubusercontent.com/5494101/136496616-7ba63aec-299f-4cc8-b681-63b4168bf9ce.png)
![Screen Shot 2021-10-08 at 3 02 06 pm](https://user-images.githubusercontent.com/5494101/136496618-29dfed63-fd87-492a-878d-cf4b236cf680.png)
![Screen Shot 2021-10-08 at 3 02 09 pm](https://user-images.githubusercontent.com/5494101/136496622-64da5ff9-586c-48fd-ab8a-2b3349bd3862.png)
![Screen Shot 2021-10-08 at 3 02 13 pm](https://user-images.githubusercontent.com/5494101/136496623-cd72a779-ba05-43d1-9ab7-e97c09f28c69.png)
![Screen Shot 2021-10-08 at 3 02 17 pm](https://user-images.githubusercontent.com/5494101/136496626-467b6778-2a59-4d81-9100-a481f61af53e.png)
![Screen Shot 2021-10-08 at 3 02 21 pm](https://user-images.githubusercontent.com/5494101/136496629-f4fa50ab-f83f-4fc0-a407-167503e2c9cb.png)
![Screen Shot 2021-10-08 at 3 02 44 pm](https://user-images.githubusercontent.com/5494101/136496637-ba30d1b7-d057-41cb-a526-b8309e3e53f7.png)
![Screen Shot 2021-10-08 at 3 02 50 pm](https://user-images.githubusercontent.com/5494101/136496639-9d0a5ab0-8041-4331-998c-c77da6c32cbf.png)
![Screen Shot 2021-10-08 at 3 02 54 pm](https://user-images.githubusercontent.com/5494101/136496641-ce04b759-4a25-4c95-a01c-d05fd720096a.png)
![Screen Shot 2021-10-08 at 3 02 59 pm](https://user-images.githubusercontent.com/5494101/136496645-852b9a36-01bd-4097-a9db-83c8605bf4da.png)
![Screen Shot 2021-10-08 at 3 01 30 pm](https://user-images.githubusercontent.com/5494101/136496598-1a26b393-5434-4e58-add2-7e5aedfa05ed.png)





















