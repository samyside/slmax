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
		if (isset(self::$instance)) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public static function query(string $sql)
	{
		$resultSet = $this->connection->query($sql);
	}

	public function __clone() {}
	public function __wakeup() {}
}
