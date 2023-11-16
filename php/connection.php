<?php
	
	// $c = "mysql:host=localhost;dbname=uel_login";
	// $u = "root";
	// $p = "";
	// $pdo = new PDO($c, $u, $p);

	$host = 'localhost';
	$db = 'uel_login';
	$user = 'root';
	$password = '';

	try {
		$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		die("Error: " . $e->getMessage());
	}
	
	return $pdo;
