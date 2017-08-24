<?php

include "config.php";

//daca nu este apasat butonul submit sa se afiseze mesajul
if (!isset($_POST["submit"])) {
    echo "Not allowed!";
    exit;
}


//se citesc valorile din formular
$brand = $_POST["brand"];
$title = $_POST["title"];
$description = $_POST["description"];
$price = $_POST["price"];
$currency = $_POST["currency"];
$stock = $_POST["stock"];

//salvam valorile  in session
$_SESSION["brand"] = $brand;
$_SESSION["title"] = $title;
$_SESSION["description"] = $description;
$_SESSION["price"] = $price;
$_SESSION["currency"] = $currency;
$_SESSION["stock"] = $stock;

// creeam obiect de tip Watch
$watch = new Watch();

// scriem datele din formular in proprietati ( Watch )
$watch->setBrand($brand);
$watch->setTitle($title);
$watch->setDescription($description);
$watch->setPrice($price);
$watch->setCurrency($currency);
$watch->setStock($stock);

// Salvam produsul in DB 
$watch->insert();

// Mesaj in session si redirect
$_SESSION["message"] = "Product added successfully!";
header("Location: index.php");
