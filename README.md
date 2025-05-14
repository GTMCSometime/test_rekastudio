<p align="center">Тестовое задание</p>


## Запуск с docker
1. docker-compose up -d
2. docker exec (имя app контейнера) composer install
3. меняем в env секцию с DB на :

- DB_CONNECTION=mysql
- DB_HOST=mysql
- DB_PORT=3306
- DB_DATABASE=db
- DB_USERNAME=user
- DB_PASSWORD=password


4. docker exec (имя app контейнера) php artisan migrate
5. (по желанию) заполнить БД тегами : docker exec (имя app контейнера) php artisan db:seed.


## Доп. информация
- 8006 (порт nginx)
- 8007 (порт phpMyAdmin)
- 3307 (порт mysql)
- инструкция по запуску curl скрипта в /curl/README.md
- http://127.0.0.1:8006/ CRUD API (front)
- DOCKER.postman_collection.json postman коллекция 
