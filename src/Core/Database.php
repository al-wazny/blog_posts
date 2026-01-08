<?php

namespace BlogPosts\Core;

use PDO;
use PDOException;

class Database 
{
	private static ?PDO $instance = null;

	private function __construct() 
	{
	}

	public static function getInstance(): PDO
	{
		$host = 'mysql';
		$db   = 'app';
		$user = 'app';
		$pass = 'app';
		$charset = 'utf8mb4';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

		if (self::$instance === null) {
		    try {
			self::$instance = new PDO($dsn, $user, $pass, [
			    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			    PDO::ATTR_EMULATE_PREPARES => false,
			]);
		    } catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		    }
		}

		return self::$instance;
	}
}
