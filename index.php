<?php

/**
 * Автор: Влад Бабенко
 * 
 * Дата реализации: 05.11.2022 11:00
 * 
 * Дата изменения: 07.11.2022 10:30
 * 
 * Точка входа программы. Создание объектов и вызов методов для теста классов User и UserArray
 */

include 'UserArray.php';

// Создание пользователя только по полям
$userById = new User('Steve', 'Howking', '2000-01-02', 1, 'Brest');
$userById->remove(3);
echo $userById->show();

// Получение пользователя по id
// $userByFields = new User(2);

// Создание списка людей по массиву id
// $arrayUsers = new UserArray(array(1, 2, 3, 4, 7));

// Удаление пользователей по в соответствии с переданным массивом id
// $arrayUsers->removeUsers();

