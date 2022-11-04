<?php

class User {
	private $id;
	private $name;
	private $surname;
	private $birthdate;
	private $sex;
	private $nativeCity;
	private $connection;

	public function __construct() {
		$this->connection = new mysqli('localhost', 'root', 'asdfasdf', 'stlmax');

		$arg_count = func_num_args();
		$args = func_get_args();

		if ($arg_count == 1) {
			$this->id = $args[0];
			$query = "SELECT name, surname, birthdate, sex, native_city FROM users WHERE id={$id};";
			$set = $this->connection->query($query);
			$row = $set->fetch_assoc();
			$this->name = $row['name'];
			$this->surname = $row['surname'];
			$this->birthdate = $row['birthdate'];
			$this->sex = $row['sex'];
			$this->nativeCity = $row['native_city'];
			
		} elseif ($arg_count == 5) {
			$this->name       = $args[0];
			$this->surname    = $args[1];
			$this->birthdate  = $args[2];
			$this->sex        = $args[3];
			$this->nativeCity = $args[4];
		}
	}

	public function save()
	{
		if ($this->connection == false) {
			// return 'Database: connection error!';
		} else {
			// return 'Database: success.';
		}
		echo "id = {$this->id}";

		$query = "update users set "
			. "name='{$this->name}' "
			. "surname='{$this->surname}' "
			. "where id={$this->id};";
		$resultSet;
		if (!$resultSet = mysqli_query($this->connection, $query)) {
			echo 'Database: error! ' . mysqli_error($this->connection);
		}

		if ($this->connection->query($query) === true) {
			echo 'surname is changed.';
		} else {
			echo 'Error! Query was failed';
		}

	}

	public function remove(int $id) : void
	{
		$query = "DELETE FROM users WHERE id={$id};";
		$this->connection->query($query);
	}

	public static function getAge() : int
	{

	}

	public static function getSex($sex) : string
	{
		return $sex ? 'муж' : 'жен';
	}

	public function format()
	{

	}
}

$newUser = new User('Steve', 'Howking', 2000, 1, 'brest');
echo User::getSex($newUser) . PHP_EOL;
// $newUser->save();
$newUser->remove(3);