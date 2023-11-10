
## Задание

- 1 Создать открытый Git репозиторий
- 2 Реализовать методы REST API для работы с пользователями
- 2.1 Создание пользователя
- 2.2 Обновление информации пользователя
- 2.3 Удаление пользователя
- 2.4 Авторизация пользователя
- 2.5 Получить информацию о пользователе
- 3 В файле README.md описать реализованные методы

## Использованные технологии
- Laravel 10
- Composer 2.6.5
- php 8.1
- sqlite
- Postman
- Githab

## Как развернуть проект
- убедитесь, что у Вас установлены composer и php нужной версии.
- склонируйте проект из репозитория [https://github.com/gukalexandr/laboratoriya_internet] с помощью команды git clone в нужную Вам директорию через терминал.
- задача выполнена в ветке task
- запустить команду composer install
- переименовать .env.example в .env изменить DB_CONNECTION=mysql на DB_CONNECTION=sqlite
- удалить строки DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=laravel DB_USERNAME=root DB_PASSWORD=
- создайте файл  database.sqlite в директории database/
- запустить миграцию php artisan migrate
- добавить тестовую запись php artisan db:seed. будет добавлен тестовый пользователь с name "Test User" email "test@example.com" password "123"
- запускаем проект с помощью команды php artisan serve. он будет доступен по url http://localhost:8000 в браузере

## Проверка API зпросов
- Для проверки использую Postman десктопную версию или web версию
- Сначала авторизуемся - Создаем POST запрос http://localhost:8000/api/login. в Params добавлеяем key email с value test@example.com. нажимаем  Send. в ответе придет token. копируем его значение
- Создание пользователя - Создаем POST запрос http://localhost:8000/api/user_add. в Authorization выбираем Bearer Token  и вводим токен, полученный при авторизации. Во вкладке Body выбираем row тип данных JSON и в поле вводим данные в виде <br>
{<br>
 "name": "Test",<br>
 "email": "test@example5.com",<br>
 "password": "123"<br>
}<br>

нажимаем  Send. получим ответ вида <br>
{<br>
    "data": {<br>
        "id": 2,<br>
        "name": "Test",<br>
        "email": "test@example5.com"<br>
    }<br>
}<br>
- Удаление пользователя - Создаем  GET запрос http://localhost:8000/api/user_delete/{id}. в Authorization выбираем Bearer Token  и вводим токен, полученный при авторизации. нажимаем  Send. получим ответ вида "message": "User deleted", если пользователь сущесвовал
- Получить информацию о пользователе -  Создаем  GET запрос http://localhost:8000/api/user_show/{id}. нажимаем  Send. получим ответ вида <br>
{<br>
    -"data": {<br>
        "id": 2,<br>
        "name": "Test",<br>
        "email": "test@example5.com"<br>
    }<br>
}<br>
- Обновление информации пользователя - Создаем PUT запрос http://localhost:8000/api/user_edit/{id}. в Authorization выбираем Bearer Token  и вводим токен, полученный при авторизации. Во вкладке Body выбираем row тип данных JSON и в поле вводим данные в виде <br>
{<br>
 "name": "Test",<br>
 "email": "test@example5.com",<br>
 "password": "123"<br>
}<br>
 нажимаем  Send. получим ответ вида <br> {<br>
    "data": {<br>
        "id": 2,<br>
        "name": "Test",<br>
        "email": "test@example5.com"<br>
    }<br>
}<br>
