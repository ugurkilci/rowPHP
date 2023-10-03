<?php

// if (postEmptyCheck('username')) {
//     echo 'Kullanıcı adı boş olamaz';
// } else {
//     // işlemler
// }

function rowPostEmptyCheck($fieldName) {
    // Belirtilen alan POST dizisinde bulunmuyor veya boş mu kontrol ediliyor.
    if (!isset($_POST[$fieldName]) || empty(trim($_POST[$fieldName]))) {
        // Eğer alan belirtilmemiş veya boşsa, true döndürülür.
        return true;
    }
    // Eğer alan dolu ise, false döndürülür.
    return false;
}
