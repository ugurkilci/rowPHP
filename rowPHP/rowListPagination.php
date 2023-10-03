<?php

// $result = rowListPagination("kullanicilar", "id, isim, email", "aktif = ?", [1], 5);

// Sonuçları göster
// echo "<h2>Kullanıcılar</h2>";
// foreach ($result['dataList'] as $user) {
//     echo "ID: " . $user['id'] . ", İsim: " . $user['isim'] . ", Email: " . $user['email'] . "<br>";
// }

// Sayfalama bağlantılarını göster
// echo "<div class='pagination'>" . $result['pageLinks'] . "</div>";

function rowListPagination($tableName, $columns = "*", $where = null, $params = [], $perPage = 10) {
    // Veritabanı bağlantısı
    global $db;

    // Mevcut sayfa numarası
    $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

    // Toplam veri sayısını hesapla
    $totalRows = $db->query("SELECT COUNT(*) FROM $tableName" . ($where ? " WHERE $where" : ""))->fetchColumn();

    // Başlangıç limiti
    $start = ($currentPage - 1) * $perPage;

    // Verileri sorgula
    $dataList = rowList($tableName, $columns, $where . " LIMIT $start, $perPage", $params);

    // Sayfalama bağlantıları oluştur
    $pages = ceil($totalRows / $perPage);
    $pageLinks = '';
    for ($i = 1; $i <= $pages; $i++) {
        $active = ($i == $currentPage) ? ' active' : '';
        $pageLinks .= "<a href='?page=$i' class='page-link$active'>$i</a>";
    }

    // Verileri ve sayfalama bağlantılarını dizi olarak döndürme
    return [
        'dataList' => $dataList,
        'pageLinks' => $pageLinks
    ];
}
