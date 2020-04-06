<?php

	class DB {

		static $dsn =  'mysql:host=db;dbname=my_db';
		static $user = 'devuser';
		static $pass = 'devpass';

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