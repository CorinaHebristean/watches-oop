<?php 

include "header.php";

//var_dump($_SESSION['cart']);

$id = $_GET["id"];
$q = $_GET["q"];

// var_dump($q);
// exit;

$cart = new Cart();

$watch = new Watch();
$watch->setId($id);
$result = $watch->getById();

$product = [
    "id" => $result["id"],
    "title" => $result["title"],
    "price" => $result["price"],
    "q" => $q,
];

// var_dump($product);
// exit;

$cart->addProduct($product);

$productsFromCart = $cart->getProducts(); 

// echo "<pre>";
// var_dump($cart);
// echo "</pre>";
// exit;

header("Location: cart.php");
exit;
