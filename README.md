# Top News

A application for news.

## Screenshots

![Home](https://firebasestorage.googleapis.com/v0/b/laravel-notification-22697.appspot.com/o/topnews%2Fscreenshot-localhost_8000-2023.09.19-12_38_19.png?alt=media&token=55dd59a0-804c-4429-8725-e3f68174fcbf)

![Home](https://firebasestorage.googleapis.com/v0/b/laravel-notification-22697.appspot.com/o/topnews%2Fscreenshot-localhost_8000-2023.09.19-12_38_47.png?alt=media&token=73534e64-fab3-4c1e-8a90-32acb1cd6312)

![Home](https://firebasestorage.googleapis.com/v0/b/laravel-notification-22697.appspot.com/o/topnews%2Fscreenshot-localhost_8000-2023.09.19-12_39_41.png?alt=media&token=ffe1236a-1ea4-4be8-afc5-ea35a914e37c)

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

## News Data Configuration:<br/>

Register at https://newsdata.io/register and get api key and write down api key in .env file:

```sh
NEWS_DATA_KEY='news_data_api_key'
```

Provide --country flag from available countries list:<br/>
Argentina - ar,<br/>
Australia - au,<br/>
Austria - at,<br/>
Bangladesh - bd,<br/>
Belgium - be,<br/>
Brazil - br,<br/>
Bulgaria - bg,<br/>
Canada - ca,<br/>
China - cn,<br/>
Colombia - co,<br/>
Cuba - cu,<br/>
Czech republic - cz,<br/>
Egypt - eg,<br/>
France - fr,<br/>
Germany - de,<br/>
Greece - gr,<br/>
Hong kong - hk,<br/>
Hungary - hu,<br/>
India - in,<br/>
Indonesia - id,<br/>
Iraq - iq,<br/>
Ireland - ie,<br/>
Israel - il,<br/>
Italy - it,<br/>
Japan - jp,<br/>
Kazakhstan - kz,<br/>
Latvia - lv,<br/>
Lebanon - lb,<br/>
Lithuania - lt,<br/>
Malaysia - my,<br/>
Mexico - mx,<br/>
Morocco - ma,<br/>
Netherland - nl,<br/>
New zealand - nz,<br/>
Nigeria - ng,<br/>
North korea - kp,<br/>
Norway - no,<br/>
Pakistan - pk,<br/>
Peru - pe,<br/>
Philippines - ph,<br/>
Poland - pl,<br/>
Portugal - pt,<br/>
Romania - ro,<br/>
Russia - ru,<br/>
Saudi arabia - sa,<br/>
Serbia - rs,<br/>
Singapore - sg,<br/>
Slovakia - sk,<br/>
Slovenia - si,<br/>
South africa - za,<br/>
South korea - kr,<br/>
Spain - es,<br/>
Sweden - se,<br/>
Switzerland - ch,<br/>
Taiwan - tw,<br/>
Thailand - th,<br/>
Turkey - tr,<br/>
Ukraine - ua,<br/>
United arab emirates - ae,<br/>
United kingdom - gb,<br/>
United states of america - us,<br/>
Venezuela - ve

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

Write down default country in .env file which you want to show news to users even if you are using single country news. By default it value is 'gb':

```sh
COUNTRY='gb'
```

If you have fetched news for multiple countries then you can show news to user for multiple country separately. To enable multiple countryies feature you just need to set "MULTIPLE_COUNTRIES" value to true in .env file. By default it is set to false. If you turn multiple countries feature then a country list will be shown to right side application logo where you can change country:

```sh
MULTIPLE_COUNTRIES=true
```

You can fetch news about different categories. You just need to write down categories name from list in "CATEGORGIES" in .env file. Categories list are given below:<br/>
business<br/>
entertainment<br/>
environment<br/>
food<br/>
health<br/>
politics<br/>
science<br/>
sports<br/>
technology<br/>
world

```sh
CATEGORGIES='politics'
```

Use comma(,) for multiple categories.

```sh
CATEGORGIES='politics,business,sports'
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit Top News in your browser at http://localhost:8000.
