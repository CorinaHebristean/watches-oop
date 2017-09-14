<?php include "header.php";

$userObject = new User();

$id = $_GET["id"];

$userObject->setId($id);

$user = $userObject->getById();

//var_dump($user);

?>

<form action="user_profile_update.php?id=<?= $user["id"] ?>" method="post">
    <p>
        Username
        <input class="form-control form-control-sm" type="text" name="username" value="<?= $user["username"] ?>">
    </p>

    <p>
        E-mail
        <input class="form-control form-control-sm" type="email" name="email" value="<?= $user["email"]?>">
    </p>

    <p>
        City
        <input class="form-control form-control-sm" type="text" name="city" value="<?= $user["city"] ?>">
    </p>

    <input type="submit" name="submit" value="Update" class="btn btn-success btn-sm">

</form>

