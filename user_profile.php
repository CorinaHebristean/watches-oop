<?php 

include "header.php";
//var_dump($user);

?>

<h1>
    Welcome <?= $user["username"] ?> (role: <?= $user["role"]; ?>)
</h1>

<p>
    <a href="user_profile_update_form.php?id=<?= $user["id"] ?>">Edit profile</a>
    <a href="user_logout.php">Logout</a>
</p>

<table>
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
        <td><a href="user_password_edit_form.php?id=<?= $user["id"] ?>">Change password</a></td>
    </tr>
</table>
