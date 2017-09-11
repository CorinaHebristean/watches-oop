<?php 

include "header.php"; 

$orderId = $_GET["orderId"];

$order = new Order();
$order->setId($orderId);
$orderItem = $order->getByOrderId();
$orderStatus =  $orderItem['status'];

$statuses = $order->getAvailableStatuses();


//    <input type="hidden" name="orderId" value="<?= $orderId 

?>

<form action="order_status_update.php?orderId=<?= $orderId ?>" method="post">

    <?php  foreach($statuses as $key => $status): ?>
        <?php 
            // $checked = "";
            // if ($key == $orderStatus) {
            //     $checked = "checked";
            // }

            $checked = ($key == $orderStatus) ? "checked" : "";
        ?>
        <input  type="radio" 
                name="status" 
                <?= $checked ?>
                value="<?= $key ?>" >
                    <?= $status ?> <br>
    
    <?php endforeach ?>

    <input type="submit" name="submit" value="Update status">

</form>


<?php include "footer.php" ?>