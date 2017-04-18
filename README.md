# Türkiye İl, ilçe, semt, mahalle ve posta kodu
PTT tarafından sunulan il, ilçe ve mahalle bilgilerinin veritabanı modeli ve bilgilerini laravel paketi olarak ekleyip veritabanına rahatlıyla uygulayabilirsiniz.

## Install
app.php içerisine service provider sınıfısımızı ekliyoruz.

```
composer require cuneytyuksel/turkey-cities
```

## Service Provider
app.php içerisine service provider sınıfısımızı ekliyoruz.

```php
/*
 * Turkey Cities
 */
Turkey\Cities\Providers\TurkeyCitiesServiceProvider::class,
```

## Vendor Publish
Config dosyasını publish ederek gerekli değişikleri sağlayabilirsiniz.

```
php artisan vendor:publish --provider="Turkey\Cities\Providers\TurkeyCitiesServiceProvider"
```

## Migration
Gerekli tabloları ve sütunları oluşturması için migration işlemi uyguluyoruz.

```
php artisan migrate
```

## Data Entegrasyonu
PTT tarafından verilen .xlsx uzantılı doyasımız dahili olarak pakaet içerisine bulunmaktadır fakat isteğiniz doğrultusunda turkey-cities.php config dosyasından yolunu değişitrip düzenlemiş olduğunuz dosya yolunuda gösterebilirsiniz.
```
php artisan turkey:cities
```

