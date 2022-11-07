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

if (!class_exists('User')) {
	echo (new Exception("Error! Class \"User\" not found\n"))->getMessage();
	die();
}

class UserArray
{
	private $users;

	public function __construct(array $users)
	{
		$this->users = $users;
	}

	public function getUsers() : array
	{
		$users = array();
		foreach ($this->users as $id) {
			try {
				array_push($users, new User($id));
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		return $users;
	}

	public function removeUsers() : void
	{
		foreach ($this->users as $id) {
			try {
				(new User($id))->remove();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
	}
}
