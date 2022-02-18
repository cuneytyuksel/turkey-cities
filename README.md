# Türkiye İl, ilçe, semt, mahalle ve posta kodu
PTT tarafından sunulan il, ilçe ve mahalle bilgilerinin veritabanı modeli ve bilgilerini laravel paketi olarak ekleyip veritabanına kolayca uygulayabilirsiniz.

## Install
config/app.php içerisine service provider sınıfısımızı ekliyoruz.

```
composer require cuneytyuksel/turkey-cities
```

## Service Provider
config/app.php içerisine service provider sınıfısımızı ekliyoruz.

```php
/*
 * Turkey Cities
 */
Turkey\Cities\Providers\TurkeyCitiesServiceProvider::class,
```

## Vendor Publish
Config dosyasını publish ederek gerekli değişikleri sağlayabilirsiniz. config/turkey-cities.php

```
php artisan vendor:publish --provider="Turkey\Cities\Providers\TurkeyCitiesServiceProvider"
```

## Migration
Veritabanında tabloları oluşturması için migration işlemi uyguluyoruz.

```
php artisan migrate
```

## Data Entegrasyonu
PTT tarafından verilen .xlsx uzantılı doyasımız dahili olarak paket içerisine bulunmaktadır fakat isteğiniz doğrultusunda turkey-cities.php config dosyasından yolunu değişitrip düzenlemiş olduğunuz dosya yolunu gösterebilirsiniz. (https://postakodu.ptt.gov.tr/)
```
php artisan turkey:cities
```

