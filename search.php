<?php

$app = require "./core/app.php";

$condition = [];

if (isset($_GET['city']) && !empty($_GET['city'])) {
	$condition = ['city' => $_GET['city']];
}

$users = User::find($app->db,'*', $condition);

$response = [];

foreach ($users as $user) {
	$response[] = [
		"name" => $user->getName(),
		"email" => $user->getEmail(),
		"city" => $user->getCity(),
		"phone" => $user->getPhone()
	];
}

header('Content-Type: application/json;charset=utf-8');
echo json_encode($response);