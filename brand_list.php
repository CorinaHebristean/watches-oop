<?php

include "header.php";

$watchBrand = new WatchBrand();
$watchBrands = $watchBrand->getAll();

$watch = new Watch();

session_message("brands");
?>

<p>
    <a href="brand_add_form.php">Add brand</a>
</p>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Nr. products</th>
        <th>Action</th>
    </tr>

    <?php foreach($watchBrands as $watchBrand): ?>
    <tr>
        <td> <?= $watchBrand["id"] ?> </td>
        <td> <?= $watchBrand["name"] ?> </td>
        <td> <?= $watch->countProducts($watchBrand["name"]) ?> </td>
        <td>
            <a href="brand_list_edit_form.php?id=<?= $watchBrand["id"]?>">Edit</a>
            <a href="brand_list_delete.php?id=<?= $watchBrand["id"]?>">Delete</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>
