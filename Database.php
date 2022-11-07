<?php
/**
 * Автор: Влад Бабенко
 * 
 * Дата реализации: 06.11.2022 12:30
 * 
 * Дата изменения: 07.11.2022 13:00
 * 
 * Класс базы данных
 */

/*
Обеспечивает соединение с базой данных, только один экземпляр и выполнение переданного запроса.
*/
class Database {
	private static $instance;
	private $connection;

	private function __construct()
	{
		$host     = 'localhost';
		$user     = 'root';
		$password = 'asdfasdf';
		$table    = 'stlmax';

		$this->connection = new mysqli(
			$host,
			$user,
			$password,
			$table
		);
	}

	public static function getInstance()
	{
		if (self::$instance === null) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public static function query(string $sql)
	{
		$db = self::getInstance();
		return $db->connection->query($sql);
	}

	public function __clone() {}
	public function __wakeup() {}
}
