# Şifre Analizi

Basit bir PHP web uygulaması. Kullanıcının girdiği şifreyi güvenlik kriterlerine göre değerlendirir ve sonucu görsel olarak gösterir.

## Ne işe yarar?

Form üzerinden bir şifre gönderildiğinde uygulama şu kontrolleri yapar:

- En az 8 karakter mi?
- Büyük harf içeriyor mu?
- Küçük harf içeriyor mu?
- Rakam içeriyor mu?
- Özel karakter içeriyor mu?

Her karşılanan kriter **20 puan** ekler (toplam **100 puan**). Puana göre şifre **Zayıf**, **Orta** veya **Güçlü** olarak sınıflandırılır.

## Özellikler

- Bootstrap 5 ile modern, ortalanmış kart arayüzü
- POST ile şifre gönderimi
- Regex tabanlı güvenlik kontrolleri
- Renkli progress bar (kırmızı / sarı / yeşil)
- Kriter bazlı kontrol listesi (✅ / ❌)
- Harici veritabanı veya bağımlılık gerektirmez (Bootstrap CDN hariç)

## Çalıştırma

PHP yüklü bir ortamda proje dizininde:

```bash
php -S localhost:8000
```

Ardından tarayıcıda `http://localhost:8000` adresini açın.
