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

$user = new User();

?>


<h1>Buy new watch!</h1>

<p>
     <a href="add_product_form.php" class="btn btn-primary btn-sm">Add product</a>
</p>


    <table class="table table-bordered table-hover table-sm">
        <thead class="table-inverse">
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Currency</th>
                <th>Stock</th>
                <th>Quantity</th>
                <?php if($user->is_admin()) : ?>
                    <th>Action</th>
                <?php endif ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach($watches as $item): ?>
                <tr>
                    <td><?php echo $item["id"]?></td>
                    <td>
                        <a href="brand_products_list.php?brand=<?= $item["brand"] ?>">
                            <?php echo $item["brand"]?>
                    </td>
                    <td><p class="lead"> <?php echo $item["title"]?> </p></td>
                    <td><p class="lead"> <?php echo $item["description"]?> </p></td>
                    <td><?php echo $item["price"]?></td>
                    <td><?php echo $item["currency"]?></td>
                    <td><?php echo $item["stock"]?></td>
                    <td>
                        <?php if($watch->isInStock($item["id"])) : ?>

                        <form action="add_to_cart.php?id=<?= $item["id"] ?>" method="get">
                            <input type="hidden" name="id" value="<?= $item["id"] ?>">
                                <select name="q">
                                    <?php $watch->selectQuantity($item["id"]); ?>
                                </select>
                            <input type="submit" name="submit" value="Add to cart" class="btn btn-success btn-sm">
                        </form>

                        <?php else: ?>
                            <p  class="alert alert-warning" role="alert">Stoc epuizat</p>
                        <?php endif; ?>
                    </td>
                    <?php if($user->is_admin()) : ?>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
  
<?php include "footer.php" ?>
