<?php

include "config.php";

$user = new User();

//citire date din formular
$username = $_POST["username"];
$email = $_POST["email"];
$city = $_POST["city"];
$password = $_POST["password"];

$user->setUsername($username);
$user->setEmail($email);
$user->setCity($city);
$user->setPassword($password);
$user->setRole("user");

$user->insert();

echo "Contul a fost creat";
