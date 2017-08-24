<?php

include "header.php";

$watch = new Watch();

$watches = $watch->getAll();

if(isset($_SESSION["message"])) {
    echo $_SESSION["message"];
    unset($_SESSION["message"]);
}

// echo "<pre>";
// var_dump($watches);
?>


<p>
     <a href="add_product_form.php">Add product</a>
</p>


    <table>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Currency</th>
            <th>Stock</th>
            <th>Quantity</th>
            <th class="table-actions">Action</th>
        </tr>

        <?php foreach($watches as $item): ?>
        <tr>
            <td><?php echo $item["id"]?></td>
            <td>
                <a href="brand_products_list.php?brand=<?= $item["brand"] ?>">
                    <?php echo $item["brand"]?>
            </td>
            <td><?php echo $item["title"]?></td>
            <td><?php echo $item["description"]?></td>
            <td><?php echo $item["price"]?></td>
            <td><?php echo $item["currency"]?></td>
            <td><?php echo $item["stock"]?></td>
            <td>
                <?php if($watch->isInStock($item["id"])) : ?>

                <form action="add_to_cart.php?id=<?= $item["id"] ?>" method="get">
                    <input type="hidden" name="id" value="<?= $item["id"] ?>">
                    <select name="q">
                    </select>
                    <input type="submit" name="submit" value="Add to cart">
                </form>
                <?php endif; ?>

            </td>
            <td>
                <?php if($watch->isInStock($item["id"])) : ?>
                    <a href="add_to_cart.php?id=<?= $item["id"]?>">Adauga in cos</a>
                <?php endif; ?>
                <br>

            </td>
        </tr>
        <?php endforeach ?>
    </table>

</body>
</html>
