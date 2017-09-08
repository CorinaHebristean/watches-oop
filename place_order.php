<?php

include "header.php";

// Read user ID
$userId = $user["id"];

// Init cart object 
$cart = new Cart();

// Read all products from cart ( from session )
$productsFromCart = $cart->getProducts();

// Calculate total and other extra stuff 
$total = $cart->calculateTotal();

// Create Order Object
$order = new Order();

// Set all properties 
$order->setTotal($total);
$order->setStatus("inregistrat");
$order->setUserId($userId);
$order->setCreatedAt(date("Y-m-d H:i:s"));

// Save Order 
$order->insert();

// Read order id
$orderId = $order->getLastId();

//var_dump($orderId); exit;

// Save order items

// OrderItem Object
$orderItem = new OrderItem();

// Set order ID
$orderItem->setOrderId($orderId); 

// Foreach $productsFromCart
foreach ($productsFromCart as $product) {
    // Save all order items
    $orderItem->setProductName($product["title"]);
    $orderItem->setPrice($product["price"]);
    $orderItem->setQ($product["q"]);

    $orderItem->insert();
}


// Empty Cart
$cart->emptyCart();

header("Location: my_order_list.php");
exit;
