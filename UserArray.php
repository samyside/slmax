<?php
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

		/*$users_by_id = implode(',', $this->users);
		$query = "SELECT id, name, surname, birthdate, sex, native_city FROM users WHERE id IN($users_by_id)";
		$connection = new mysqli('localhost', 'root', 'asdfasdf', 'stlmax');
		$result_set = $connection->query($query);
		while ($row = $result_set->fetch_assoc()) {
			array_push($users, new User($row['name']));
		}

		foreach ($this->users as $i) {
			array_push($users, new User($this->users[$i]));
		}*/
	}

	public function removeUsers()
	{
		foreach ($this->users as $id) {
			User::remove($id);
		}
	}
}
