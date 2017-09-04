<?php include "config.php";

$id = $_GET["id"];
$password = $_POST["password"];

$userObject = new User();

//var_dump($userObject);

$userObject->setId($id);
$userObject->setPassword($password);

$userObject->editPassword();

header("Location: user_profile.php");
