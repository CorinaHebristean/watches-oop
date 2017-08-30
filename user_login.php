<?php

include "config.php";

$user = new User;

if(isset($_POST["submit"])) {
    $this->username = $_POST["username"];
    $this->password = $_POST["password"];

    $sql = "SELECT *FROM users
            WHERE username = '$this->username'
            AND password = '$this->password'";

    echo $sql;
    
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    $this->user = $stmt->fetch();

    if($this->user) {
        $_SESSION["logged_in"] = 1;
        $_SESSION["user"] = $this->user;

        header ("Location: user_profile.php");
        exit;
    } else {
        $_SESSION["message"]["error"] = "Bad credentials!";

        header ("Location: user_login_form.php");
        exit;
    }
}
