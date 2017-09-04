<?php include "header.php"; ?>

<form action="user_profile_update.php?id=<?= $user["id"] ?>" method="post">
    <p>
        Username
        <input type="text" name="username" value="<?= $user["username"] ?>">
    </p>

    <p>
        E-mail
        <input type="email" name="email" value="<?= $user["email"]?>">
    </p>

    <p>
        City
        <input type="text" name="city" value="<?= $user["city"] ?>">
    </p>

    <p>
        Role
        <input type="text" name="role" value="<?= $user["role"] ?>">
    </p>

    <input type="submit" name="submit" value="Update">

</form>

