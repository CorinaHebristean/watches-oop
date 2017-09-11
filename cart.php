<?php

include "header.php";

$cart = new Cart();
$productsFromCart = $cart->getProducts();

// echo "<pre>";
// var_dump($productsFromCart);
// echo "</pre>";
?>

<h1>My cart (<?= $cart->countProducts(); ?>)</h1>

<form action="update_cart.php" method="post">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($productsFromCart as $product) : ?>

            <tr>
                <td> <?= $product["id"]; ?> </td>
                <td> <?= $product["title"] ?> </td>
                <td> <?= $product["price"] ?> </td>
                <td> 
                    <input type="text" name="q[<?= $product['id'] ?>]" value="<?= $product['q'] ?>">
                </td>               
                <td> <?= $product["price"] * $product["q"] ?> </td>
                <td> <a href="remove_from_cart.php?id=<?= $product["id"]?>" class="btn btn-danger">Remove from cart</a> </td>    
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <h3>
        <input type="submit" name="submit" value="Update cart" class="btn btn-success">
        <a href="place_order.php" class="btn btn-warning">Place order</a>
    </h3>
</form>

<h3>Total: <?= $cart->calculateTotal(); ?></h3>
<h3><a href="empty_cart.php" class="btn btn-danger">Empty cart</a></h3>
