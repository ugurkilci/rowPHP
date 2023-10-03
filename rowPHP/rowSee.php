<?php

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
    global $db; // Global veritabanı bağlantısını kullanacağımızı belirtiyoruz.

    // Gelen $data değişkenini "=>" işaretine göre ayırarak sütun adını ve değeri alıyoruz.
    $data = explode("=>", $data);
    $col = $data[0] . "=?";
    $row = $data[1];

    // SQL sorgusunu hazırlıyoruz.
    $see = $db->prepare("SELECT * FROM $tableName WHERE $col");
    $see->execute([$value]);

    // Sorguyu çalıştırıyoruz ve sonucu alıyoruz.
    $see = $see->fetch(PDO::FETCH_ASSOC);

    // İlgili sütundaki değeri döndürüyoruz.
    return @$see[$row]; // Eğer sütun veya değer bulunamazsa hata almamak için '@' kullanıldı.
}
