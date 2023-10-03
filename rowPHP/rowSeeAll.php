<?php

// echo rowSeeAll(
//     "categories",
//     ["id" => $id]
// );

function rowSeeAll($tableName, $columns)
{
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // Sorgu için sütunları ve değerleri oluştur
    $conditions = [];
    $values = [];

    // Gelen $columns dizisini döngüye alarak sütun adlarını ve değerlerini ayırıyoruz.
    foreach ($columns as $column => $value) {
        $conditions[] = "$column=?";
        $values[] = $value;
    }

    // WHERE koşullarını oluşturuyoruz.
    $conditions = implode(" AND ", $conditions);

    // SQL sorgusunu hazırlıyoruz.
    $see = $db->prepare("SELECT * FROM $tableName WHERE $conditions");
    $see->execute($values);

    // Sorguyu çalıştırıyoruz ve sonucu alıyoruz.
    $result = $see->fetch(PDO::FETCH_ASSOC);

    return $result;
}
