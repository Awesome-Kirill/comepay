###### скачать репозиторий
> git clone https://github.com/Awesome-Kirill/comepay.git
###### отредактировать .env конфиг. Указать свои настройки БД
>DB_CONNECTION=mysql
>DB_HOST=mysql
>DB_PORT=3306
>DB_DATABASE=test
>DB_USERNAME=dev
>DB_PASSWORD=dev
###### установить зависимости
> composer install --prefer-dist
###### накатить миграции
> php artisan migrate
###### может понадобиться установить права на запись для папок:
> bootstrap/cache/
> storage/framework/
