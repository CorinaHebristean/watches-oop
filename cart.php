<?php

include "header.php";

$cart = new Cart();

?>

<h1>My cart (<?= $cart->countProducts(); ?>)</h1>

<form action="update_cart.php" method="post">
    <table>
        <tr>
            <th>Product ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>

        <?php foreach ($cart as $key=>$value) : ?>
            
            <tr>
                <td> <?= $product["id"]; ?> </td>
                <td> <?= $product["title"] ?> </td>
                <td> <?= $product["price"] ?> </td>
                <td> 
                    <input type="text" name="q[<?= $product['id'] ?>]" value="<?= $product['q'] ?>">
                </td>               
                <td> <?= $product["price"] * $product["q"] ?> </td>
                <td> <a href="remove_from_cart.php?id=<?= $product["id"]?>">Remove from cart</a> </td>    
            </tr>
        <?php endforeach ?>
    </table>

    <h3>
        <input type="submit" name="submit" value="Update cart">
        <a href="place_order.php">Place order</a>
    </h3>
</form>

<h3>Total: <?= $cart->calculateTotal(); ?></h3>
<h3><a href="empty_cart.php">Empty cart</a></h3>
