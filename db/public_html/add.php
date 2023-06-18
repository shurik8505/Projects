<?php


$name = $_POST['name'];
$age = $_POST['age'];
$city = $_POST['city'];


require 'conn.php';

$sql = "INSERT INTO db VALUES (null,:name,:age,:city)";
$query = $conn -> prepare($sql);
$query -> execute(['name' => $_POST['name'],'age' => $_POST['age'],'city' => $_POST['city']]);


header('Location: /');