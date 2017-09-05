<?php 

include "header.php";

$id = $_GET["id"];

$q = 1;

if(isset($_GET["q"])){
    $q = $_GET["q"];
}

$watch = new Watch();
$watch->setId($id);
$product = $watch->getById();

$cart = new Cart();
$cart->addProduct($product);

// echo "<pre>";
// var_dump($cart);
// echo "</pre>";
// exit;

header("Location: cart.php");
exit;
