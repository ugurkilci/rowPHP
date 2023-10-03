<?php

// Örnek bir app/init.php kodu:

error_reporting(E_ALL);
ini_set('display_errors', 0);

session_start();
ob_start();

// $directory = str_replace("/home/domain/public_html/klasor1/klasor2/", "", __DIR__) . "/";
$directory = __DIR__ . "/../app/";

// Ekstra bir dosyayı eklemek için:
include $directory . 'htmltags.php';

//////////////////////
// Ekstra klasörün içindekileri init.php'ye ekletip çalıştırmak için
$dir = opendir($directory . "klasor-adi");
while ($file = readdir($dir))
{
    $filepath = $directory . "klasor-adi/" . $file;
    if (!is_dir($filepath))
    {
        include $filepath;
    }
}
//////////////////////

// GETs
$q          = @$_GET["q"];
$p          = @$_GET["p"];
$s          = @$_GET["s"];
$l          = @$_GET["l"];
$r          = @$_GET["r"];
$id         = @$_GET["id"];
$sign       = @$_GET["sign"];
$continue   = @$_GET["continue"];

$user_id    = @$_SESSION["id"];

// CSRF Token
$_SESSION["_token"] = md5(time());

include $directory . 'config.php';
