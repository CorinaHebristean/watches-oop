<?php

include "config.php";

$orderId = $_GET["orderId"];
$status = $_POST["status"];

//var_dump($orderId, $status);

$order = new Order();

$order->setId($orderId);
$order->setStatus($status);

// pana aici totul ok 

$order->updateStatus();

header("Location: my_order_list.php");
exit;
