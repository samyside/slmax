<?php
/**
 * Автор: Влад Бабенко
 * 
 * Дата реализации: 06.11.2022 11:45
 * 
 * Дата изменения: 07.11.2022 14:17
 * 
 * Класс для работы со списками людей
 */

/*
Класс работает при помощи класса User. Содержит массив id.
Методы:
getUsers() - возвращает массив объектов User, в соответствии с массивом, переданном в конструктор
removeUsers() - удаляет записи User из базы данных
*/
include 'User.php';

class UserArray
{
	private $users;

	public function __construct(array $users)
	{
		$this->users = $users;
	}

	public function getUsers()
	{
		$users = array();
		foreach ($this->users as $id) {
			array_push($users, new User($id));
		}
		return $users;
	}

	public function removeUsers()
	{
		foreach ($this->users as $id) {
			User::remove($id);
		}
	}
}
