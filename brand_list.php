<?php

include "header.php";

$watchBrand = new WatchBrand();

$watchBrands = $watchBrand->getAll();

$watch = new Watch();

session_message("brands");
?>

<p>
    <a href="brand_add_form.php" class="btn btn-outline-primary btn-sm">Add brand</a>
</p>

<table class="table table-bordered table-hover table-sm">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Nr. products</th>
            <th>Action</th>
        </tr>
    </thead>

    <?php foreach($watchBrands as $brand): ?>
        <?php $watch->setBrand($brand["name"]); ?>
        <tbody>
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
                    <a href="brand_list_edit_form.php?id=<?= $brand["id"]?>" class="btn btn-outline-success btn-sm">Edit</a>
                    <a href="brand_list_delete.php?id=<?= $brand["id"]?>" class="btn btn-outline-danger btn-sm">Delete</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach ?>
</table>
