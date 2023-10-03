<?php

// Kullanım örnekleri:
// 2. parametre zorunlu değildir. Yazılmadığınde otomatik İngilizce çalışacaktır.
// echo timeConvert("2023-10-03 12:34:56", [
//     'just_now' => 'şimdi',
//     'secs' => 'sn',
//     'mins' => 'dk',
//     'hrs' => 'sa',
//     'days' => 'gün',
//     'wks' => 'hafta',
//     'mon' => 'ay',
//     'yrs' => 'yıl'
// ]); 

function timeConvert($time, $customTranslations = null) {
    // Dil çevirileri belirtilen dilde yoksa varsayılan İngilizce çeviriler kullanılır.
    $translations = [
        'en' => [
            'just_now' => 'just now',
            'secs' => 'secs',
            'mins' => 'mins',
            'hrs' => 'hrs',
            'days' => 'days',
            'wks' => 'wks',
            'mon' => 'mon',
            'yrs' => 'yrs'
        ]
    ];

    // Eğer özel bir dil belirtilmişse, bu çevirileri kullanır.
    if (is_array($customTranslations)) {
        $translations['custom'] = $customTranslations;
        $lang = 'custom';
    } else {
        $lang = 'en';
    }

    // Zamanı Unix zaman damgasına çevirir.
    $time = strtotime($time);
    $time_difference = time() - $time;
    $second = $time_difference;
    $minute = round($time_difference / 60);
    $hour = round($time_difference / 3600);
    $day = round($time_difference / 86400);
    $week = round($time_difference / 604800);
    $month = round($time_difference / 2419200);
    $year = round($time_difference / 29030400);

    // Zaman dilimine göre uygun metni döndürür.
    if ($second < 60) {
        if ($second == 0) {
            return $translations[$lang]['just_now'];
        } else {
            return $second . ' ' . $translations[$lang]['secs'];
        }
    } elseif ($minute < 60) {
        return $minute . ' ' . $translations[$lang]['mins'];
    } elseif ($hour < 24) {
        return $hour . ' ' . $translations[$lang]['hrs'];
    } elseif ($day < 7) {
        return $day . ' ' . $translations[$lang]['days'];
    } elseif ($week < 4) {
        return $week . ' ' . $translations[$lang]['wks'];
    } elseif ($month < 12) {
        return $month . ' ' . $translations[$lang]['mon'];
    } else {
        return $year . ' ' . $translations[$lang]['yrs'];
    }
}
