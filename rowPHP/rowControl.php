<?php

// if (rowControl("mail", "user_email", $email)) {
//     echo "Email address exists in the database.";
// } else {
//     echo "Email address does not exist in the database.";
// }

// Eğer sadece tek parametere kullanılırsa bunun anlamı o veritabanındaki tüm seçeneklerin varlığını kontrol etmesidir. rowControl("tablo_adi");

function rowControl($table, $column = null, $value = null) {
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // Eğer $column ve $value değerleri null değilse, WHERE koşulunu ekliyoruz.
    $whereClause = "";
    $params = [];
    if ($column !== null && $value !== null) {
        $whereClause = "WHERE $column = ?";
        $params = [$value];
    }

    $selectRow = $db->prepare("SELECT * FROM $table $whereClause");
    $selectRow->execute($params);

    $rowCount = $selectRow->rowCount();

    return $rowCount > 0;
}

