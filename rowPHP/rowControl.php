<?php

// if (rowControl("mail", "user_email", $email)) {
//     echo "Email address exists in the database.";
// } else {
//     echo "Email address does not exist in the database.";
// }

function rowControl($table, $column, $value) {
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // SQL sorgusunu hazırlıyoruz.
    $selectRow = $db->prepare("SELECT * FROM $table WHERE $column = ?");
    $selectRow->execute([$value]);

    // Sorgunun döndürdüğü satır sayısını alıyoruz.
    $rowCount = $selectRow->rowCount();

    // Satır sayısının 0'dan büyük olup olmadığını kontrol ediyoruz.
    return $rowCount > 0;
}
