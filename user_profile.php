<?php 

include "header.php";
//var_dump($user);

?>

<h1>
    Welcome <?= $user["username"] ?> (role: <?= $user["role"]; ?>)
</h1>

<p>
    <a href="user_profile_update_form.php?id=<?= $user["id"] ?>" class="btn btn-outline-warning btn-sm">Edit profile</a>
    <a href="user_logout.php" class="btn btn-outline-secondary btn-sm">Logout</a>
</p>

<table class="table table-bordered table-sm">
    <tr>
        <th>Username</th>
        <td><?= $user["username"] ?></td>
    </tr>
    <tr>
        <th>E-mail</th>
        <td><?= $user["email"] ?></td>
    </tr>
    <tr>
        <th>City</th>
        <td><?= $user["city"] ?></td>
    </tr>
    <tr>
        <th>Role</th>
        <td> <?= $user["role"] ?> </td>
    </tr>
    <tr>
        <th>Password</th>
        <td><a href="user_password_edit_form.php?id=<?= $user["id"] ?>" class="btn btn-outline-danger btn-sm">Change password</a></td>
    </tr>
</table>
