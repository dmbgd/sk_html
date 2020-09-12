<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
$pdo = new PDO('mysql:host=localhost;dbname=cp60848_sk', 'cp60848_sk', 'sktest123');
$sql = "INSERT INTO sk_test (`time`, `name`, `phone`, `email`) VALUES (NOW(), ?, ?, ?)";
$stmt= $pdo->prepare($sql);
$stmt->execute(['123', '123', '123']);
*/


	$dbh = new PDO('mysql:host=localhost;dbname=cp60848_sk', 'cp60848_sk', 'sktest123');

	$q = "INSERT INTO sk_test (`time`, `name`, `phone`, `email`) VALUES (NOW(), :name, :phone, :email)";
	$sth = $dbh->prepare($q);
	
	$name = '123';
	$sth->bindParam(':name', $name, PDO::PARAM_STR);
	$sth->bindParam(':phone', $name, PDO::PARAM_STR);
	$sth->bindParam(':email', $name, PDO::PARAM_STR);

    $sth->execute();
	
	