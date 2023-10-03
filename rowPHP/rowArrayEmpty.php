<?php

// Bu işlev (arrayEmpty) bir çok boyutlu dizinin tüm değerlerini kontrol eder ve eğer hiçbir değer boş değilse (veya alt diziler boş değilse), true değerini döndürür. Aksi takdirde, false döndürür.

// Bu işlevin çalışma mantığı şu şekildedir:

// foreach döngüsüyle, dizi içindeki her bir değeri kontrol eder.
// Eğer bir değer bir dizi ise, işlevi tekrar kendisine çağırarak bu alt diziye de bakar.
// Eğer bir değer boş ise (empty fonksiyonu boş bir değeri kontrol eder), false döndürür. Bu, dizinin boş olmadığı anlamına gelir.
// Eğer döngü sona ererse, bu demektir ki hiçbir boş değer bulunmamıştır ve true döndürülür.

// Bu işlev, özellikle çok boyutlu dizilerde derinlemesine boş değer kontrolü yapmak için kullanışlıdır. Örneğin, bir formun tüm alanlarının doldurulup doldurulmadığını kontrol etmek için kullanılabilir.

function arrayEmpty($arr) {
    // Dizinin her bir değerini kontrol et
    foreach ($arr as $value) {
        // Eğer değer bir dizi ise
        if (is_array($value)) {
            // Alt diziyi kontrol et
            if (!arrayEmpty($value)) {
                return false;
            }
        } else {
            // Değer bir dizi değilse, boş olup olmadığını kontrol et
            if (empty($value)) {
                return false;
            }
        }
    }
    // Eğer hiçbir boş değer bulunmazsa, dizinin tamamı doludur
    return true;
}
