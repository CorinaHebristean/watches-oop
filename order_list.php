<?php

include "header.php";

// presupunem ca suntem pe full order list 
$userId = 0; 
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
}

$order = new Order();

if ($userId > 0) {

    $order->setUserId($userId);
    $orders = $order->getAllByUserId();
} else {

    $orders = $order->getAll(); 
}

$statuses = $order->getAvailableStatuses();

?>

<div class="row">
    <div class="col-12">
        <h2>
            <?php echo ($userId > 0) ? "My orders" :  "All orders" ?></h2>
        <hr>
    </div>
</div>

<div class="row">

    <div class="col-2">
        <?php foreach($statuses as $key => $status): ?>
            <p>
            <a href="#" class="btn btn-outline-primary  btn-block"><?= $status ?></a> 
            </p>
        <?php endforeach; ?>

    </div>

    <div class="col-10">
  

        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td> <?= $order["id"] ?> </td>
                    <td> <?= $order["user_id"] ?> </td>
                    <td> <?= $order["total"] ?> </td>
                    <td> <?= $order["status"] ?> </td>
                    <td> <?= $order["created_at"] ?> </td>
                    <td> <a href="order_items.php?orderId=<?= $order['id']; ?>"  class="btn btn-outline-dark">Details</a> </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php" ?>