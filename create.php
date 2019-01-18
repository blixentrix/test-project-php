<?php

$app = require "./core/app.php";

$response = [];

if (!isset($_POST['name']) || empty($_POST['name']) ||
 !isset($_POST['email']) || empty($_POST['email']) ||
!isset($_POST['city']) || empty($_POST['city']) ||
!isset($_POST['phone']) || empty($_POST['phone'])) {
	$response = ["error" => "Some fields are missing"];
}
else {
	// Create new instance of user
	$user = new User($app->db);
	// Insert it to database with POST data
	$user->insert(array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'city' => $_POST['city'],
		'phone' => $_POST['phone']
	));

	$response = [
		"name" => $user->getName(),
		"email" => $user->getEmail(),
		"city" => $user->getCity(),
		"phone" => $user->getPhone()
	];
}

header('Content-Type: application/json;charset=utf-8');
echo json_encode($response);