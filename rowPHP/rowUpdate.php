<?php

// $rowUpdate = rowUpdate("users", ["email"=>$email], ["id"=>$_SESSION["id"]]);

function rowUpdate($tableName, $data, $where) {
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // UPDATE sorgusunun temel yapısını oluşturuyoruz.
    $query = "UPDATE " . $tableName . " SET ";

    // Güncellenecek sütun isimlerini alıyoruz.
    $columns = array_keys($data);

    $set = [];
    foreach ($columns as $column) {
        // Her bir sütunun değerini ? işareti ile belirtiyoruz.
        $set[] = "$column=?";
    }

    // SET bölümünü oluşturuyoruz.
    $query .= implode(",", $set);

    // WHERE bölümünü ekliyoruz.
    $query .= " WHERE ";

    // WHERE koşullarını oluşturuyoruz.
    $conditions = [];
    $whereColumns = array_keys($where);
    foreach ($whereColumns as $column) {
        // Her bir koşulun değerini ? işareti ile belirtiyoruz.
        $conditions[] = "$column=?";
    }

    // WHERE koşullarını ekliyoruz.
    $query .= implode(" AND ", $conditions);

    // Değerleri hazırlıyoruz.
    $values = array_values(array_merge($data, $where));

    // Sorguyu hazırlıyoruz.
    $stmt = $db->prepare($query);

    // Değerleri bağlıyoruz ve sorguyu çalıştırıyoruz.
    $stmt->execute($values);

    return $stmt;
}
