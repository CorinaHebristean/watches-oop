<?php

include "config.php";

//citire date
$id = $_GET["id"];
$name = $_POST["brand_name"];

//creare obiect de tip WatchBrand
$watchBrand = new WatchBrand();

//scriere date din formular in proprietati (WatchBrand)
$watchBrand->setId($id);
$watchBrand->setName($name);

//salvare editare in DB
$watchBrand->edit();

//mesaj si redirect
$_SESSION["message"] = "Brand updated";
header("Location: brand_list.php");
