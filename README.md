# Smart Genix

A application for news.

## Installation

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Run database migrations:

```sh
php artisan migrate
```

Run news fetch. provide --country flag with available countries list
[
Argentina - ar,
Australia - au,
Austria - at,
Bangladesh - bd,
Belgium - be,
Brazil - br,
Bulgaria - bg,
Canada - ca,
China - cn,
Colombia - co,
Cuba - cu,
Czech republic - cz,
Egypt - eg,
France - fr,
Germany - de,
Greece - gr,
Hong kong - hk,
Hungary - hu,
India - in,
Indonesia - id,
Iraq - iq,
Ireland - ie,
Israel - il,
Italy - it,
Japan - jp,
Kazakhstan - kz,
Latvia - lv,
Lebanon - lb,
Lithuania - lt,
Malaysia - my,
Mexico - mx,
Morocco - ma,
Netherland - nl,
New zealand - nz,
Nigeria - ng,
North korea - kp,
Norway - no,
Pakistan - pk,
Peru - pe,
Philippines - ph,
Poland - pl,
Portugal - pt,
Romania - ro,
Russia - ru,
Saudi arabia - sa,
Serbia - rs,
Singapore - sg,
Slovakia - sk,
Slovenia - si,
South africa - za,
South korea - kr,
Spain - es,
Sweden - se,
Switzerland - ch,
Taiwan - tw,
Thailand - th,
Turkey - tr,
Ukraine - ua,
United arab emirates - ae,
United kingdom - gb,
United states of america - us,
Venezuela - ve
], By default pages are set to 1 but you can change page number by providing --pages for number of pages

```sh
php artisan news:fetch --country=gb --pages=3
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit Top News in your browser at http://localhost:8000.
