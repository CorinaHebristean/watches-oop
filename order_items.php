<?php

include "header.php";

$orderId = $_GET["orderId"];

$orderItem = new OrderItem();

$orderItem->setOrderId($orderId);

$orderItems = $orderItem->getAll();

//var_dump($orderItems);

?>

<h2>Order #<?= $orderId ?> details</h2>

<table class="table table-hover table-bordered table-sm">
    <thead class="table-inverse">
        <tr>
            <th>Order ID</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($orderItems as $item) : ?>
            <tr>
                <td> <?= $item["order_id"] ?> </td>
                <td> <?= $item["product_name"] ?> </td>
                <td> <?= $item["price"] ?> </td>
                <td> <?= $item["q"] ?> </td>
                <td> <?= $item["price"] * $item["q"] ?> </td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>


<?php include "footer.php" ?>