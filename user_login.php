<?php

include "config.php";

$user = new User;

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $logged_in_user = $user->login($username, $password);

    // var_dump($logged_in_user);
    // exit;

    if($logged_in_user) {
        $_SESSION["logged_in"] = 1;
        $_SESSION["user"] = $logged_in_user;

        // var_dump($_SESSION["user"]);
        // exit;

        header ("Location: user_profile.php");
        exit;
    } else {
        $_SESSION["message"]["error"] = "Bad credentials!";

        header ("Location: user_login_form.php");
        exit;
    }
}
