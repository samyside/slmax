<?php
/**
 * TODO:
 * [+] Проверять в конструкторе, доступен ли указанный id
 * 
 * Автор: Влад Бабенко
 * 
 * Дата реализации: 05.11.2022 11:00
 * 
 * Дата изменения: 07.11.2022 10:30
 * 
 * Описание сущности User
 */

include_once 'Database.php';

/*
Класс User создает сущность с полями: id, имя, фамилия, дата рождения, пол, город рождения.
Принимает в конструкторе либо одно поле с id, либо с полями: имя, фамилия, дата рождения, пол, город рождения. В случае передачи id, читает запись из БД с указанным id. В случае передачи полей, создает новую запись в БД с указанными полями.
Методы класса:
- remove(int). Удаляет запись из БД по id
- convertDateToAge(string). Получает возраст исходя из даты рождения
- getSex(bool). Получает строковое значение пола исходя из булевского значения
- show(). Получает строковое значение всех полей
- format(). Возвращает новый экземпляр stdClass с преобразованными полями возраста и пола.
*/
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
			if (!$this->isExists($this->id)) {
				echo 'HERE IS Exception' . PHP_EOL;
				throw new Exception("Error! User is undefined by id($this->id)");
			}
			$sql = "SELECT name, surname, birthdate, sex, native_city FROM users WHERE id={$this->id}";
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
			$this->save();
		} else {
			throw new Exception("Error! Wrong amount of parameters in __construct()\n", 1);
		}
	}

	private function save()
	{
		$sql = "INSERT INTO users "
			. "(name, surname, birthdate, sex, native_city) "
			. "VALUES ('{$this->name}', '{$this->surname}', "
			. "'{$this->birthdate}', {$this->sex}, '{$this->nativeCity}')";
		Database::query($sql);
	}

	public function isExists(int $id)
	{
		$sql = "SELECT id FROM users WHERE id=$id";
		echo 'NUM_ROWS: ' . Database::query($sql)->num_rows . PHP_EOL;
		return Database::query($sql)->num_rows > 0;
	}

	// Deprecated
	private function edit()
	{
		$sql = "UPDATE users SET "
			. "name='{$this->name}', "
			. "surname='{$this->surname}', "
			. "birthdate='{$this->birthdate}', "
			. "sex='{$this->sex}', "
			. "native_city='{$this->nativeCity}' "
			. "WHERE id={$this->id}";

		Database::query($sql);
	}

	// Deprecated
	private function create()
	{
		$sql = "INSERT INTO users "
			. "(name, surname, birthdate, sex, native_city) "
			. "VALUES ('{$this->name}', '{$this->surname}', "
			. "'{$this->birthdate}', {$this->sex}, '{$this->nativeCity}')";
		Database::query($sql);
	}

	public static function remove(int $id) : void
	{
		$sql = "DELETE FROM users WHERE id={$id}";
		Database::query($sql);
	}

	public function getBirthdate()
	{
		return $this->birthdate;
	}

	public function getSex()
	{
		return $this->sex;
	}

	public static function convertDateToAge($birthdate) : int
	{
		echo 'birthdate=' . $birthdate . PHP_EOL;
		return date_diff(date_create($birthdate), date_create('now'))->y;
	}

	public static function convertSex($sex) : string
	{
		return $sex ? 'муж' : 'жен';
	}

	public function show() : string
	{
		return "{id:$this->id; "
			. "name:$this->name; "
			. "nativeCity:$this->nativeCity; "
			. "birthdate:$this->birthdate"
			. "}\n";
	}

	public function format() : stdClass
	{
		$obj = new stdClass;
		$obj->id = $this->id;
		$obj->name = $this->name;
		$obj->surname = $this->surname;
		$obj->birthdate = $this->birthdate;
		$obj->sex = $this->sex;
		$obj->nativeCity = $this->nativeCity;
		$obj->age = self::convertDateToAge($this->getBirthdate());
		$obj->sex = self::convertSex($this->getSex());
		return $obj;
	}
}

