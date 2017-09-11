<?php

include "header.php";

$order = new Order();

$order->setUserId($user["id"]);

$orders = $order->getAllByUserId();

?>

<h2>My orders</h2>

<table>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Total</th>
        <th>Status</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

    <?php foreach ($orders as $order) : ?>
        <tr>
            <td> <?= $order["id"] ?> </td>
            <td> <?= $order["user_id"] ?> </td>
            <td> <?= $order["total"] ?> </td>
            <td> <?= $order["status"] ?> </td>
            <td> <?= $order["created_at"] ?> </td>
            <td> 
                <a href="order_items.php?orderId=<?= $order['id']; ?>">Details</a>
                <a href="order_status_update_form.php?orderId=<?= $order['id'] ?>">Change status</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>


<?php include "footer.php" ?>