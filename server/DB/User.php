<?php
	require_once 'DB.php';	

	class User extends DB {

		public function createUser($username, $email, $pass) {
			$pdo = $this->connect();

			$stmt = $pdo->prepare("INSERT INTO users(username, email, pass) VALUES (?, ?, ?)");
			$stmt->execute([$username, $email, $pass]);

			return (bool)$stmt;
		}

		public function getUserByUsername($username) {
			$pdo = $this->connect();

			$stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
			$stmt->execute([$username]);

			return $stmt->fetch(PDO::FETCH_ASSOC);
		}

		public function getUserByEmail($email) {
			$pdo = $this->connect();

			$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
			$stmt->execute([$email]);
			
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}
		
		public function updateAdditionalInfo($username, $data) {
			$pdo = $this->connect();

			$sql = 'UPDATE users SET';
			if (isset($data['fname']))	$sql .= ' fname = ?,';
			if (isset($data['lname']))	$sql .= ' lname = ?,';
			if (isset($data['age']))	$sql .= ' age = ?,';
			if (isset($data['bio']))	$sql .= ' bio = ?,';
			if (isset($data['pic']))	$sql .= ' pic = ?,';

			$sql = trim($sql, ',');
			$sql .= ' WHERE username = ?';
			$data['username'] = $username;
			$data = array_values($data);

			$stmt = $pdo->prepare($sql);
			// var_dump($data);
			// echo '<br>';
			// print_r($stmt);
			// exit;
			$stmt->execute($data);

			return (bool)$stmt;
		}

	}