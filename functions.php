<?php

function session_message($key = false)
{
    if ($key) {
        if (isset($_SESSION["message"][$key])) {
            echo $_SESSION["message"][$key];
            unset($_SESSION["message"][$key]);
        }
    } else {
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
    }
}

//checkbox pentru selectare moneda
function select_currency($watchCurrency=''){
    $currencies = ["USD", "GBP", "LEI", "EURO"];
    foreach($currencies as $currency){
        if($currency == $watchCurrency){
            echo "<input type='radio' name='currency' value='$currency' checked>$currency<br>";
        } else {
            echo "<input type='radio' name='currency' value='$currency'>$currency<br>";
        }
    }
}
