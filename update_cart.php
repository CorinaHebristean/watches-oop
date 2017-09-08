<?php

include "header.php";

// Create cart object 
$cart = new Cart();

// Update Cart 
$cart->handleUpdate();

// Redirect to myCart  
header("Location: cart.php");
exit;



