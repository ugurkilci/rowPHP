<?php

/*
rowAdd(
    "categories",
    [
        "user_id" => "1",
        "name" => "Soru Sor"
    ]
);
*/

function rowAdd($tableName, $data) {
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // INSERT INTO sorgusunun temel yapısını oluşturuyoruz.
    $query = "INSERT INTO " . $tableName . " SET ";

    // Eklenecek sütun isimlerini alıyoruz.
    $columns = array_keys($data);

    // SET bölümünü oluşturuyoruz.
    $query .= implode("=?,", $columns) . "=?";

    // SQL sorgusunu hazırlıyoruz.
    $dataAdd = $db->prepare($query);

    // Sütun değerlerini bağlıyoruz ve sorguyu çalıştırıyoruz.
    $dataAdd->execute(array_values($data));

    return $dataAdd;
}
