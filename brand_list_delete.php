<?php

include "header.php";

$watchBrand = new WatchBrand;

$id = $_GET["id"];

$watchBrand->setId($id);

$watchBrand->delete();

header("Location: brand_list.php");
