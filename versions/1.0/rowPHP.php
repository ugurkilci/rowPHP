<?php

// if (postEmptyCheck('username')) {
//     echo 'Kullanıcı adı boş olamaz';
// } else {
//     // işlemler
// }

function postEmptyCheck($fieldName) {
    if (!isset($_POST[$fieldName]) || empty(trim($_POST[$fieldName]))) {
        return true;
    }
    return false;
}

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
    global $db;
    $query      =   "INSERT INTO " . $tableName . " SET ";
    $columns    =   array_keys($data);
    $query      .=  implode("=?,", $columns) . "=?";
    $dataAdd    =   $db->prepare($query);
    $dataAdd    ->  execute(array_values($data));

    return $dataAdd;
}

// echo rowCount(
//     "categories",
//     "id"
// );

function rowCount(
    $tableName, // Tablo
    $col = NULL,
    $value = NULL
)
{
    global $db;

    if (
        $value
    ) {
        $where = "WHERE $col=?";
    }else{
        $value = "";
        $where = "";
    }

    $rowCount = $db->prepare("SELECT COUNT(*) FROM $tableName $where");
    $rowCount->execute([
        $value
    ]);
    $rowCount = $rowCount->fetchColumn();
   
    return $rowCount;
}

// rowDelete(
//     "categories",
//     [
//         "user_id" => 2,
//         "link" => "sitelink"
//     ]
// );

function rowDelete($tableName, $data, $type = "and") {
    global $db;

    $query      =   "DELETE FROM " . $tableName . " WHERE ";
    $columns    =   array_keys($data);
    $query      .=  implode("=? $type", $columns) . "=?";
    $dataAdd    =   $db->prepare($query);
    $dataAdd    ->  execute(array_values($data));

    return $delete;
}

// echo rowSee(
//     "categories",
//     "id=>description",
//     "1"
// );

function rowSee(
    $tableName, // Tablo
    $data,  // Sütundan => sütuna, şu sütundaki şu veriyi yazdır
    $value  // Değer
)
{
    global $db;

    $data   = explode(
        "=>", $data
    );
    $col    = $data[0] . "=?";
    $row    = $data[1];

    $see = $db -> prepare("SELECT * FROM $tableName WHERE
        $col
    ");
    $see -> execute([
        $value
    ]);
    $see = $see -> fetch(PDO::FETCH_ASSOC);
    
    return @$see[$row];
}

// $rowUpdate = rowUpdate("users", ["email"=>$email], ["id"=>$_SESSION["id"]]);

function rowUpdate($tableName, $data, $where) {
    global $db;
    $query = "UPDATE " . $tableName . " SET ";
    $columns = array_keys($data);
    $set = [];
    foreach ($columns as $column) {
    $set[] = "$column=?";
    }
    $query .= implode(",", $set);
    $query .= " WHERE ";
    $conditions = [];
    $whereColumns = array_keys($where);
    foreach ($whereColumns as $column) {
    $conditions[] = "$column=?";
    }
    $query .= implode(" AND ", $conditions);
    $values = array_values(array_merge($data, $where));
    $stmt = $db->prepare($query);
    $stmt->execute($values);
    return $stmt;
}
