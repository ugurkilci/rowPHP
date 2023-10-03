<?php

// rowConfigPostgreSql("localhost", "veritabanı adı", "kullanıcı adı", "şifre", "port no");

function rowConfigPostgreSql($host, $dbname, $root, $password, $port, $charset = "utf8) {
  try {
    // Veritabanına bağlanma işlemi
    $db = new PDO("pgsql:host=$host;port=$port;dbname=$database", $username, $password);

    // Hata modunu ayarlayalım (opsiyonel)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die("Veritabanına bağlanılamadı: " . $e->getMessage());
  }
}
