<?php include "header.php";

$userObject = new User();

$id = $_GET["id"];

$userObject->setId($id);

$user = $userObject->getById();

//var_dump($user);

?>

<form action="user_password_edit.php?id=<?= $user["id"] ?>" method="post">
    <p>
        Password
        <input type="password" name="password" value="<?= $user["password"] ?>">
    </p>

    <input type="submit" name="submit" value="Change password">

</form>
