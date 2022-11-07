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

$user1 = new User('Steve', 'Howking', '2000-01-02', 1, 'Brest');
echo $user1->show();
$user2 = new User(2);

$array_users = new UserArray(array(1, 2, 3, 4, 7));

foreach ($array_users->getUsers() as $user) {
	echo $user->show();
}
// $array_users->removeUsers();

$user3 = new User(3);
var_dump($user3);
$user3 = $user3->format();
echo User::convertDateToAge($user2->getBirthdate());
var_dump($user3);
// var_dump($user1, $user3);

try {
	$user100 = new User(100);
	echo 'isExists() : ' . $user100->isExists($user100->id) . PHP_EOL;
	var_dump($user100);
} catch (Exception $e) {
	// echo "Undefined user by id($user100->id)" . PHP_EOL;
	var_dump($e);
	echo $e->getMessage() . PHP_EOL;
}

echo 'FINISH.' . PHP_EOL;
