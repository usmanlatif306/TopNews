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

News Data Configuration:<br/><br/>

Register at https://newsdata.io/register and get api key and write down api key in .env "NEWS_DATA_KEY"

Run News Fetch:<br/><br/>

Provide --country flag with available countries list
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
]:

```sh
php artisan news:fetch --country=gb
```

By default above command with fetch 1 page of news which contain 10 news but if you want to fetch more news you can provide --pages flag with pages you required to fetch. Again reminder each page contain 10 news and if you provide --pages value to 3 then it will fetch 10\*3=30 news:

```sh
php artisan news:fetch --country=gb --pages=3
```

If you want to get news of different countries then provide multiple --country flag with country value from countries list provided above:

```sh
php artisan news:fetch --country=gb --country=us
```

You can provide --pages flag as well with multiple country flag to get more news within a country. each page conatin 10 news:

```sh
php artisan news:fetch --country=gb --country=us --pages=2
```

If you have fetched news for multiple countries then you can show news to user for multiple country separately. To enable multiple countryies feature you just need to set "MULTIPLE_COUNTRIES" value to true in .env file. By default it is set to false. If you turn multiple countries feature then a country list will be shown to right side application logo where you can change country :

```sh
MULTIPLE_COUNTRIES=true
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit Top News in your browser at http://localhost:8000.
