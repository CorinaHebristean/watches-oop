<?php
include "header.php";

$watchBrand = new WatchBrand();

$id = $_GET["id"];

$watchBrand->setId($id);

$brand = $watchBrand->getById();

// echo "<pre>";
// var_dump($brand);
// exit;

?>

<form action="brand_list_edit.php?id=<?= $brand["id"]?>" method="post">

    <p>
        Name <input type="text" name="brand_name" value="<?= $brand["name"]?>">
        <?php session_message("brand_name") ?>
    </p>

    <input class="btn btn-success btn-sm" type="submit" name="submit" value="Update">
    
</form>
</body>
</html>
