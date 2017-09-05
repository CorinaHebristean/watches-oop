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
        <link href="style.css" rel="stylesheet">
    </head>
<body>
<nav>
    <ul>
        <li>
            <a href="index.php">Watches</a>
        </li>
        <li>
            <a href="brand_list.php">Brands</a>
        </li>

        <li>
            <a href="cart.php">My cart (<?= $cart->calculateTotal(); ?> USD - <?= $cart->countProducts(); ?> pcs)</a>
        </li>

        <?php if ($user == false): ?>
            <li>
                <a href="user_login_form.php">Login</a>
            </li>
        <?php else: ?>
            <li>
                <a href="user_profile.php">My profile (<?= $user["username"] ?>)</a>
            </li>
            <li>
                <a href="my_order_list.php">My order</a>
            </li>
            <li>
                <a href="order_list.php">All orders</a>
            </li>
            <li>
                <a href="user_logout.php">Logout</a>
            </li>
        <?php endif ?>
    </ul>
    <div class="clear"></div>
</nav>
