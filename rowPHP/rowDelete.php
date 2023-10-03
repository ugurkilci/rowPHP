<?php

// rowDelete(
//     "categories",
//     [
//         "user_id" => 2,
//         "link" => "sitelink"
//     ]
// );

function rowDelete($tableName, $data, $type = "and") {
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // DELETE FROM sorgusunun temel yapısını oluşturuyoruz.
    $query = "DELETE FROM " . $tableName . " WHERE ";

    // Sileceğimiz sütun isimlerini alıyoruz.
    $columns = array_keys($data);

    // WHERE koşulunu oluşturuyoruz.
    $query .= implode("=? ".$type." ", $columns) . "=?";

    // SQL sorgusunu hazırlıyoruz.
    $dataAdd = $db->prepare($query);

    // Sütun değerlerini bağlıyoruz ve sorguyu çalıştırıyoruz.
    $dataAdd->execute(array_values($data));

    return $dataAdd;
}
