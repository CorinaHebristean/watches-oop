<?php

include "header.php";

?>

<h1>Register</h1>

<form action="new_user.php" method="post">
    <p>
        Username
        <input type="text" name="username">
    </p>

    <p>
        E-mail
        <input type="email" name="email">
    </p>

    <p>
        City
        <input type="text" name="city">
    </p>

    <p>
        Password
        <input type="password" name="password">
    </p>

    <input type="submit" name="submit" value="Register">

</form>



<?php include "footer.php" ?>