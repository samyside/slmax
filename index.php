<?php

/*
Автор:

Дата реализации: 05.11.2022

Дата изменения: 05.11.2022

Утилита для работы с базой данных "mysql" (консольная утилита GNU/Linux)
*/

include 'user.php';
include 'entities.php';

$newUser = new User('Steve', 'Howking', 2000, 1, 'Brest');
echo User::getSex($newUser) . PHP_EOL;
$newUser->remove(3);
$newUser->save();

$existUser = new User(69);
$existUser->setName('Robert');
$existUser->save();
