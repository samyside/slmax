<?php

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
