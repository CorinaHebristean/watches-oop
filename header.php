<?php

include "config.php";

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
            <a href="cart.php">My cart</a>
        </li>

        <?php if (true): ?>
            <li>
                <a href="user_login_form.php">Login</a>
            </li>
        <?php else: ?>
            <li>
                <a href="user_profile.php">My profile</a>
            </li>
            <li>
                <a href="order_list.php">My order</a>
            </li>
            <li>
                <a href="user_logout.php">Logout</a>
            </li>
        <?php endif ?>
    </ul>
    <div class="clear"></div>
</nav>
