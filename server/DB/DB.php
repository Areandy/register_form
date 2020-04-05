<?php

	class DB {

		static $dsn =  'mysql:host=localhost;dbname=my_db';
		static $user = 'max';
		static $pass = '123QWEqwe';

		public function connect() {

			try {
				$pdo = new PDO(self::$dsn, self::$user, self::$pass);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $pdo;
			} catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}

		}

	}