<?php

include "header.php";

// presupunem ca suntem pe full order list 
$userId = 0; 
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
}

$status = false;
if(isset($_GET["status"])) {
    $status = $_GET["status"];
}

$order = new Order();


$orders = $order->getAllByStatusAndUser($status, $userId);

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
            <a href="order_list.php?userId=<?= $userId ?>&status=<?= $status ?>" class="btn btn-outline-primary  btn-block"><?= $status ?></a> 
            </p>
        <?php endforeach; ?>

    </div>

    <div class="col-10">
  

        <table class="table table-hover table-bordered table-sm">
            <thead class="thead-inverse">
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
                    <td> <a href="order_items.php?orderId=<?= $order['id']; ?>"  class="btn btn-outline-dark btn-sm">Details</a> </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "footer.php" ?>