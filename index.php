<?php

/*
Автор:

Дата реализации: 05.11.2022

Дата изменения: 05.11.2022

Утилита для работы с базой данных "mysql" (консольная утилита GNU/Linux)
*/

include 'UserArray.php';

$user1 = new User('Steve', 'Howking', 2000, 1, 'Brest');
echo $user1->show();
$user2 = new User(1);

$array_users = new UserArray([1,2,3,4, 10]);

foreach ($array_users->getUsers() as $user) {
	echo $user->show();
}
$array_users->removeUsers();
