<?php
include "config.php";

$id = $_GET["id"];

$watch = new Watch;

$watch->setId($id);
$watchById = $watch->getById();

?>

<form action="add_to_cart.php?id=<?= $watchById["id"] ?>" method="post">
     <table>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Currency</th>
            <th>Quantity</th>
        </tr>
        <tr>
            <td> <?= $watchById["id"] ?> </td>
            <td> <?= $watchById["brand"] ?> </td>
            <td> <?= $watchById["title"] ?> </td>
            <td> <?= $watchById["description"]?> </td>
            <td> <?= $watchById["price"]?> </td>
            <td> <?= $watchById["currency"]?> </td>
            <td>
                <select>
                    <option value=""> <?= $watchById["q"] ?> </option>
                </select>
            </td>
        </tr>
        <input type="submit" name="submit" value="Add to cart">
</form>
