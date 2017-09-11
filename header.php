<?php

include "config.php";

$user = false;

if(isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

//var_dump($user);

$cart = new Cart();

?>

<!DOCTYPE html>
<html>
    <head>
        <link href="vendor/bootstrap-4.0.0-beta/dist/css/bootstrap.css" rel="stylesheet">
    </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Watches</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
   
       
      <li class="nav-item">
            <a class="nav-link" href="brand_list.php">Brands</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="cart.php">My cart (<?= $cart->calculateTotal(); ?> USD - <?= $cart->countProducts(); ?> pcs)</a>
        </li>

        <?php if ($user == false): ?>
            <li class="nav-item">
                <a class="nav-link" href="user_login_form.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="new_user_form.php">Register</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="user_profile.php">My profile (<?= $user["username"] ?>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="my_order_list.php">My order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="order_list.php">All orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_logout.php">Logout</a>
            </li>
        <?php endif ?>
      
    </ul>

  </div>
</nav>

<div class="container">
