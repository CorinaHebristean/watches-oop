<?php

include "header.php";

//citire valori din formular
$brand_name = $_POST["brand_name"];

//creare obiect (WatchBrand)
$watchBrand = new WatchBrand;

//scriere valoare in proprietate WatchBrand
$watchBrand->setName($brand_name);

//salvare brand in DB
$watchBrand->insert();

//redirectonare
header("Location: brand_list.php");
exit;
