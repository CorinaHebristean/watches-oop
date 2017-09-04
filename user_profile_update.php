<?php include "config.php";

//citire date din formular
$id = $_GET["id"];
$username = $_POST["username"];
$email = $_POST["email"];
$city = $_POST["city"];
$role = $_POST["role"];

//creare obiect de tip User
$userObject = new User();

// var_dump($userObject);
// exit;

//scriere date din formular in proprietatile User
$userObject->setId($id);
$userObject->setUsername($username);
$userObject->setEmail($email);
$userObject->setCity($city);
$userObject->setRole($role);

//salvare editare in DB
$userObject->edit();

$_SESSION["message"] = "User updated";
header("Location: user_profile.php");
