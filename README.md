# rowPHP
Hızlı ürün geliştirmek için oluşturulmuş PHP frameworküdür.

Ben arka tarafta yavaş yavaş ihtiyaca göre geliştiriyorum. Vakit buldukça buradan paylaşacağım.

# Şu An Neler Yapabiliyor?
- Veri ekleme
- Veri sadece bir verisini çekme: ID yazıp kullanıcı adını çekmek gibi
- Verinin tüm verilerini çekme: ID yazıp o satırda ne varsa hepsini çekmek gibi
- Veri silme
- Veri güncelleme
- Veri listeleme
- Veri sayfalama
- Veri saydırma: Veritabanında kaç tane veri varsa onların toplamını yazdırıyor
- Veritabanı kontrolü: Kullanıcı adı var mı yok mu diye kontrol etmek yada eposta daha önce eklenip eklenmediğini kontrol etmek gibi
- Veri bağlantısı
- Postgre SQL için veri bağlantısı: Supabase'de kullanılabilmektedir
- CSRF güvenliği
- SEO uyumlu link oluşturma / Sef Link / Permalink
- Tüm dillere uyumlu zaman dönüştürücüsü: "1 dakika önce yayınlandı" diyebilmek için
- SEO uyumlu HTML tagleri eklemek
- Boş arrayleri kaldırma
- Hazır init.php: MVC için

# Kullanım Dinamikleri / Kuralları
- Her ne kadar fonksiyonlar İngilizce yazılsa da dinamikler Türkçe dil yapısını kullanmaktadır.
- İngilizce olmasının sebebi büyük projelerle bir harmoni ile çalışması için aksi halde arkamızdan söverler.
- Türkçe dinamikleriyle kodlandı. Türkçe sondan eklemeli bir dildir. Oku => okumak gibi sondan ekleniyor. Aynı şekilde rowSee(); fonksiyonunda 1 tane veriyi çekerken tüm satırı çekmek için rowSeeAll(); kullanıyoruz. Yani o özelliğin hep sonunda ekleme gelmektedir.
- Fonksiyon yapısını kullanmaktadır.
- Fonksiyonlarda camel case isimlendirme kullanmaktadır.
- Tüm fonksiyonlar "row" ile başlamaktadır. Çünkü öğrenmesi çok kolay. Bazıları mantık hataları oluştursa da bu kuralı koydum çünkü gerçekten akılda kalması çok kolay. Örneğin time convert için row niye başa yazılır ki? Biraz mantık hatası oluyor ama öğrenim kolaylığı için hepsinin başında "row" olması öğrenmesi kolay olur. Ayrıca başka fonksiyonlar ve kodlarla karışmaması için işe yaramaktadır. Aksi halde başka bir kodu ezebilir veya hata verebilir.
- Sadece init.php'de "row" yok çünkü bu bir dosya. Ekstra bir fonksiyon değil. Belki duruma göre ekleyebilirim. Hatta bir ara eklesem hiç fena olmaz.

# Neden Row?
Çünkü foreach işleminde yıllarca row ile yazdırdım. Ve aklıma ekstra yaratıcı bir şey gelmedi. İlk aklıma geleni koydum. Ve bu tüm dillerde kolay telafuz edilebiliyor. Magic deseydim biz ona megiç demezdik, magic derdik. Ama row hep row.
