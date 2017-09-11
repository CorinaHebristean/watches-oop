<?php

include "header.php";

$user = new User();

$users = $user->getAll();

//var_dump($users);

?>

<h1>Customers</h1>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($users as $user) : ?>
            <tr> 
                <td>
                    <?= $user["id"] ?>
                </td>
                <td>
                    <?= $user["username"] ?>
                </td>
                <td>
                    <?= $user["email"] ?>
                </td>
                <td>
                    <a href="order_list.php?userId=<?= $user["id"] ?>" 
                        class="btn btn-outline-dark">Orders</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php include "footer.php" ?>
