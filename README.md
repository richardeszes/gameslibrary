# A projekt működtetése

## Technikai követelmények

A projekt Laravel frameworköt használ, mely a következő requirement-eket határozta meg:

* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

## Apache beállítások

A vhost document rootjának a projekt public könyvtárát kell beállítani.

## Adatbázis beállítások

A `.env` fájl tartalmazza a beállításokat.

`DB_CONNECTION` - hagyjuk meg a beállított értéket

`DB_HOST` - adatbázis szerver címe

`DB_PORT` - adatbázis szerver portja

`DB_DATABASE` - használandó adatbázis neve

`DB_USERNAME` - csatlakozáshoz használt felhasználónév

`DB_PASSWORD` - csatlakozáshoz használt jelszó

A beállított adatbázisba importálni kell a mellékelt db_dump.sql fájl tartalmát,
vagy lefuttatni a `php artisan migrate:install --seed` parancsot, mely létrehozza
a szükséges táblákat és felölti demo adatokkal.

Amennyiben később újra resetelni szeretnénk az adatbázist, a
`php artisan migrate:refresh --seed` parancs kiadásával visszaáll az adatbázis
importálásakor beállított tartalomra.

## Bejelentkezés

A bejelentkezéshez a következő demo user jön létre az adatbázisban:

username: `admin@localhost.dev`

password: `secret`
