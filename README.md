# goodfood-verlaravel

## enable apache rewrite (./index.php/abc -> ./abc)
- cd ./goodfood-verlaravel
- docker-compose up 
- docker exec -it goodfood-verlaravel_apache_1 bash
- a2enmod rewrite
- exit
- docker-compose restart

## migrate DB
- rename .envexample to .env
- DB_HOST=mysql --> DB_HOST=127.0.0.1:3696
- cd ./goodfood-verlaravel/src/goodfood 
- php artisan migrate

## seeder DB
- php artisan db:seed
- open .env
- DB_HOST=127.0.0.1:3696 --> DB_HOST=mysql
