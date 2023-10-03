<?php

// rowConfig("localhost", "veritabanı adı", "kullanıcı adı", "şifre");

function rowConfig($host, $dbname, $root, $password, $charset = "utf8) {
  try{
  	$db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root, $password);
  }catch(PDOExeption $error){
  	echo $error->getMessage();
  }
}
