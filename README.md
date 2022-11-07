# stlmax

## Окружение при разработке
PHP version: PHP 8.1.12
MySQL version: 8.0.31-0ubuntu0.22.04.1
OS: GNU/Linux x86_64 5.15.0-52-generic

## Как запустить/тестировать
Чтобы запустить необходимо:
1. Склонировать репозиторий
```git clone https://github.com/samyside/stlmax.git```
2. Перейти в директорию с проектом
```cd stlmax```
3. Создать базу данных и таблицу MySQL. Для этого:
3.1 Запустить утилиту `mysql`
```mysql -u root -p```
3.2 Запустить создание базы данных, таблицы и импорт данных
```source <path/to/file/demo_table.sql```
4. Запустить index.php через терминал либо, если настроен сервер, через браузер
```php index.php```
