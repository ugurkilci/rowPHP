<?php

// Config dosyasının en altına yapıştırın:
// $_SESSION["_token"] = md5(time());

function rowCsrf()
{
    echo '<input type="hidden" name="_token" value="'.$_SESSION["_token"].'">';
}

function rowCsrfControl()
{
    // Post içinde kullanınız. Bilhassa en tepesinde.
    if ($_POST["_token"] !== $_SESSION["_token"]) { die('CSRF Token!'); }
}
