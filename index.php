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

try {
	echo "\n---> Создание пользователя только по полям\n";
	$userByFields = new User('Stephen', 'Hawking', '1942-01-08', 1, 'Oxford');
	var_dump($userByFields);

	echo "\n---> Получение пользователя из базы данных по id\n";
	$userById = new User(3);
	var_dump($userById);

	echo "\n---> Попытка получить несуществующего пользователя в базе данных\n";
	$userById = new User(999);
} catch (Exception $e) {
	echo $e->getMessage();
}

echo "\n---> Удаление пользователя по id\n";
$userByFields->remove();

echo "\n---> Преобразование даты рождения в возраст\n";
echo User::convertDateToAge('2000-01-02');

echo "\n---> Преобразование значение поля 'пол' из двоичной системы в строковое 'муж' или 'жен'\n";
echo "--> " . User::convertSex(0) . "\n";
echo "--> " . User::convertSex(1) . "\n";

echo "\n---> Форматирование пользователя с преобразованием возраста и (или) пола\n";
$objectStd = $userByFields->format(0);
var_dump($objectStd);
$objectStd = $userByFields->format('2000-02-01');
var_dump($objectStd);
$objectStd = $userByFields->format(1, '1998-04-10');
var_dump($objectStd);

$userArray = new UserArray(array(1, 3, 5, 6));
$listUsers = $userArray->getUsers();
var_dump($listUsers);

echo "\n---> Удаление пользователей в соответствии с переданным массивом\n";
$userArray->removeUsers();
