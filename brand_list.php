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

    <?php foreach($watchBrands as $brand): ?>
        <?php $watch->setBrand($brand["name"]); ?>
        <tr>
            <td> 
                <?= $brand["id"] ?>
            </td>
            <td> 
                <?= $brand["name"] ?> 
            </td>
            <td> 
                <?= $watch->countProducts() ?> 
            </td>
            <td>
                <a href="brand_list_edit_form.php?id=<?= $brand["id"]?>">Edit</a>
                <a href="brand_list_delete.php?id=<?= $brand["id"]?>">Delete</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
