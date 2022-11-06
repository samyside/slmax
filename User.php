<?php
include_once 'Database.php';

class User {
	private $id;
	private $name;
	private $surname;
	private $birthdate;
	private $sex;
	private $nativeCity;

	public function __construct() {
		$args_count = func_num_args();
		$args = func_get_args();

		if ($args_count === 1) {
			$this->id = $args[0];
			$sql = "SELECT name, surname, birthdate, sex, native_city FROM users WHERE id={$this->id};";
			// TODO Проверять, доступен ли указанный id
			$set = Database::query($sql);
			$row = $set->fetch_assoc();
			$this->name       = $row['name'];
			$this->surname    = $row['surname'];
			$this->birthdate  = $row['birthdate'];
			$this->sex        = $row['sex'];
			$this->nativeCity = $row['native_city'];
		} elseif ($args_count === 5) {
			$this->name       = $args[0];
			$this->surname    = $args[1];
			$this->birthdate  = $args[2];
			$this->sex        = $args[3];
			$this->nativeCity = $args[4];
		} else {
			throw new Exception("Error! Wrong amount of parameters in __construct()\n", 1);
		}

		$this->save();
	}

	private function save()
	{
		if (isset($this->id)) {
			$this->edit($this->id);
		} else {
			$this->create($this);
		}
	}

	private function edit()
	{
		$sql = "UPDATE users SET "
			. "name='{$this->name}', "
			. "surname='{$this->surname}', "
			. "birthdate='{$this->birthdate}', "
			. "sex='{$this->sex}', "
			. "native_city='{$this->nativeCity}' "
			. "WHERE id={$this->id};";

		Database::query($sql);
	}

	private function create()
	{
		$sql = "INSERT INTO users "
			. "(name, surname, birthdate, sex, native_city) "
			. "VALUES ('{$this->name}', '{$this->surname}', "
			. "'{$this->birthdate}', {$this->sex}, '{$this->nativeCity}');";
		Database::query($sql);
	}

	public static function remove(int $id) : void
	{
		$sql = "DELETE FROM users WHERE id={$id}";
		Database::query($sql);
	}

	public static function getAge() : int
	{
		return date_diff(date_create($this->birthdate, date_create('now')))->y;
	}

	public static function getSex($sex) : string
	{
		return $sex ? 'муж' : 'жен';
	}

	public function show() : string
	{
		return "{id:$this->id; "
			. "name:$this->name; "
			. "nativeCity:$this->nativeCity"
			. "}\n";
	}

	public function format() : stdClass
	{
		$obj = (object) get_object_vars($this);
		$obj->age = self::getAge();
		$obj->sex = self::getSex();
		return $obj;
	}
}

