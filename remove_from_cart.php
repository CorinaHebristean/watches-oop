<?php

include "header.php";

$id = $_GET["id"];

// var_dump($id);
// exit;

$cart = new Cart;

$cart->removeProduct($id);

header("Location: cart.php");
exit;
