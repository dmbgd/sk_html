<?php

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);


$secret_key = '6LfkUcMZAAAAAJ-uNgrC4IGIRcKqt0U_GLC3qED4';

if (isset($_POST)) {

    $response = $_POST['g-recaptcha-response'];

    $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $response);

    $res = json_decode($payload, true);

    if ($res['success'] != 1) {
        echo "0";
        exit;
    }
}

if (strlen($name) == 0 || strlen($phone) == 0 || strlen($email) == 0) {
    echo "0";
    exit;
}

$dbh = new PDO('mysql:host=localhost;dbname=cp60848_sk', 'cp60848_sk', 'sktest123');

$q = "INSERT INTO sk_test (`time`, name, phone, email)
		VALUES(NOW(), :name, :phone, :email)";
$sth = $dbh->prepare($q);
$sth->bindParam(':name', $name, PDO::PARAM_STR);
$sth->bindParam(':phone', $phone, PDO::PARAM_STR);
$sth->bindParam(':email', $email, PDO::PARAM_STR);
$sth->execute();

echo "1";