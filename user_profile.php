<?php 

include "header.php"; 

$user = $_SESSION["user"];

// var_dump($user);

?>

<h1>
    Welcome <?= $user["username"] ?>
</h1>

<p>
    <a href="user_profile_update_form.php">Edit profile</a>
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
</table>
