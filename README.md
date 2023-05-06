# rowPHP
Ürün geliştirmeyi kolaylaştıracak bir frameworktür. Zamanla ihtiyaca göre geliştireceğim. Her seferinde yeni versiyonlar halinde yayınlayacağım.

İsim için hiç düşünmedim. Dümdüz row dedim geçtim. Sinatra gibi bir şey yapsam hiç fena olmazdı ama bununla yetinin. :)

Şu an temel özellikleri var ama ilerledikçe sadece bunu kullanarak hızlı hızlı ürünler çıkartabileceksiniz. Asıl amacım bu.

Her ne kadar Türkçe döküman yazsam da kullanılacak dil İngilizce olacak. Kod İngilizce olarak yazılacak. Biraz daha dünya standartlarına ulaşmak istiyorum. Issue açmaktan çekinmeyin. :)

Edit: Hepsinin bir dosyada olması, versiyon hali beni çok zorladı. Ben normalde ayrı ayrı kullanıyorum. Bir ara burayı güncelleyeceğim.

## Kod Kullanım Örnekleri

### Veri Ekleme
```
rowAdd(
    "categories",
    [
        "user_id" => "1",
        "name" => "Soru Sor"
    ]
);
```
### Tekli Veri Çekme
```
rowSee(
    "categories",
    "id=>description",
    "1"
);
```
### Veri Saydırma
```
rowCount(
    "categories",
    "id"
);
```
### Veri Silme
```
rowDelete(
    "categories",
    [
        "user_id" => 2,
        "link" => "sitelink"
    ]
);
```
### Veri Güncelleme
```
rowUpdate(
    "users",
    [
        "email" => $email
    ],
    [
        "id" => $_SESSION["id"]
    ]
);
```
### Zaman dönüştürme (timeConvert) 
timestampi buraya yazdığınızda "5 saat önce" gibi bir sonuç çıkartıyor.
```
timeConvert(***);
```
