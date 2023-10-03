<?php

// echo rowCount(
//     "categories",
//     "id"
// );

function rowCount($tableName, $col = NULL, $value = NULL)
{
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // WHERE koşulunu ve parametreleri hazırlıyoruz.
    if ($col && $value) {
        $where = "WHERE $col=?";
        $params = [$value];
    } else {
        $where = "";
        $params = [];
    }

    // SQL sorgusunu hazırlıyoruz ve çalıştırıyoruz.
    $rowCount = $db->prepare("SELECT COUNT(*) FROM $tableName $where");
    $rowCount->execute($params);

    // Sorgunun döndürdüğü toplam satır sayısını alıyoruz.
    $rowCount = $rowCount->fetchColumn();

    return $rowCount;
}
