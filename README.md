
# 🔄 JSON API to Laravel Generator

Bu Laravel tabanlı uygulama, verdiğiniz bir JSON API'den veri yapısını analiz ederek otomatik olarak:

- ✅ Migration dosyası
- ✅ Model sınıfı
- ✅ CRUD özellikli Controller
- ✅ Route tanımı (`api.php` içinde)

oluşturur.

---

## 🚀 Kurulum

1. Laravel projenizi kurun:
   ```bash
   composer create-project laravel/laravel json-api-generator
   ```

2. Gerekli dosyaları yerleştirin:
   - `routes/web.php` içine route tanımları
   - `app/Http/Controllers/ApiGeneratorController.php`
   - `resources/views/api-generator/form.blade.php`
   - `resources/views/layouts/app.blade.php` (varsa)

3. Web sunucunuzu başlatın:
   ```bash
   php artisan serve
   ```

4. Tarayıcıdan şu adrese gidin:
   ```
   http://127.0.0.1:8000/api-generator
   ```

---

## 🧠 Nasıl Çalışır?

1. JSON API adresini forma girersiniz.
2. Sistem, JSON içinde `data` alanını analiz eder.
3. Gerekli dosyalar aşağıdaki klasörlerde oluşturulur:
   - `database/migrations/` → Migration dosyası
   - `app/Models/` → Model dosyası
   - `app/Http/Controllers/` → Controller dosyası
   - `routes/api.php` → Route eklemesi

---

## 💡 Örnek

API URL:
```
https://api.falsepeti.xyz/api/fortune-teller/show/derya-nural
```

Tablo adı:
```
fortune_tellers
```

---

## ✨ Özellikler

- Otomatik veri tipi algılama (int, string, bool, json, timestamp)
- Fillable alanlar Model içinde otomatik yazılır
- CRUD Controller hazır gelir
- Route satırı kendiliğinden eklenir

---

## 📌 Gereksinimler

- PHP 8.1+
- Laravel 10+ veya 12+
- `guzzlehttp/guzzle` paketi (Laravel zaten içeriyor)

---

## 🛡️ Uyarı

Route dosyası `routes/api.php` içine **doğrudan satır ekler**. Aynı kaynak adıyla tekrar üretim yapacaksan dosyaları elle temizlemen önerilir.

---

## 👨‍💻 Geliştirici

Mehmet Demir  
📫 [GitHub](https://github.com/mehmetdemiriniz)

---

## 📝 Lisans

MIT Lisansı
