<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## PostgreSql

- В корне лежит файл TZ.sql с решением sql

## Laravel

- composer install
- php artisan:key:generate
- php artisan migrate
- php artisan db:seed

## Информация

- В таблице santa_lists: santa_user_id - ссылка на санту, 
  ward_user_id - ссылка на подопечного

## Тест
- (GET) /ward/{id} - путь для получения подопечного с информацией о его санте
- (GET) /santa/{id} - путь для получения санты с информацией о его подопечном






