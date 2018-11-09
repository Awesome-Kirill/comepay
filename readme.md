##### скачать репозиторий
> git clone https://github.com/Awesome-Kirill/comepay.git
##### отредактировать .env конфиг. Указать свои настройки БД
>DB_CONNECTION=mysql

>DB_HOST=mysql

>DB_PORT=3306

>DB_DATABASE=test

>DB_USERNAME=dev

>DB_PASSWORD=dev

##### установить зависимости
> composer install --prefer-dist
##### кеш
> php artisan config:cache 
##### накатить миграции
> php artisan migrate
##### может понадобиться установить права на запись для папок:
> bootstrap/cache/

> storage/framework/

API

Таблица сотрудник/Департамент geе('list'); 

Получить список департаментов с кол-вом работников и макс.зарпалтой get('departments/list');

Получить список сотрудников get('employee/list');

Создать департамент post('departments/create');

Изменить департамент post('departments/edit/{id}');

Удалить департамент delete('departments/delete/{id}');

Создать сотрудникоа post('employee/create');

Редактировать сотрудника post('employee/edit/{id}');

Удалить сотрудника delete('employee/delete/{id}');
