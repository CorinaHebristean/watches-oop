<?php

include "header.php";

$cart = new Cart();

$product = [
    'id' => 3,
    'title' => 'laptop',
    'q' => 1,
    'price' => 100,
];

$product2 = [
    'id' =>6,
    'title' => 'laptop',
    'q' => 1,
    'price' => 100,
];

echo "Avem " . $cart->countProducts() . " produse in cos <br>";

$cart->addProduct($product);
echo "Avem " . $cart->countProducts() . " produse in cos <br>";

$cart->addProduct($product2 );


echo "Avem " . $cart->countProducts() . " produse in cos <br>";

// $cart->removeProduct(3);
$cart->emptyCart();
echo "Avem " . $cart->countProducts() . " produse in cos <br>";

echo '<pre>';
var_dump($cart);
echo '</pre>';