<?php

// // WHERE koşulu için parametre bağlama kullanımı
// $minId = 10;
// $dataList = rowList("myTable", "*", "id > ?", [$minId]);

// // Birden fazla koşul için parametre bağlama kullanımı
// $category = 'news';
// $status = 'published';
// $dataList = rowList("myTable", "*", "category = ? AND status = ?", [$category, $status]);

function rowList($tableName, $columns = "*", $where = null, $params = []) {
    // Veritabanı bağlantısı
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // Sorgu hazırlama
    $query = "SELECT $columns FROM $tableName";
    if($where) {
        $query .= " WHERE $where";
    }

    // SQL sorgusunu hazırlıyoruz ve çalıştırıyoruz.
    $dataList = $db->prepare($query);
    $dataList->execute($params);

    // Sorgunun döndürdüğü tüm satırları bir dizi olarak alıyoruz.
    $dataList = $dataList->fetchAll(PDO::FETCH_ASSOC);

    // Sonuçları döndürme
    return $dataList;
}
