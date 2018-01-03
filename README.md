# DevBay Community - Firma
@todo badge do wpięcia

## O projekcie
**Firma** to projekt, którego celem jest stworzenie przyjaznego miejsca dla przedsiębiorcy.

Funkcje
- Wystawianie faktur z możliwością automatyzacji(dla powtarzających się pozycji)
- CRM dla kontrahentów
- Statystyki sprzedaży
- Moduł wyliczania podatków i optymalizacji kosztów
- Powiadomienia o nieopłaconych fakturach

## Rozwój
Jeśli chcesz pomóc rozwijać projekt, zajrzyj do [CONTRIBUTING.md](https://github.com/devbay-pl/firma/blob/master/CONTRIBUTING.md)

## Instalacja
```bash
$ git clone git@github.com:devbay-pl/firma.git
$ cd firma
$ composer install
```
Następnie utworzyć na bazie `.env.dist` własny plik konfiguracyjny `.env`.
W linii `DATABASE_URL=` należy podać dane dostępowe do bazy danych.

Po konfiguracji `.env` należy utworzyć schematy w bazie danych poleceniem:
```bash
$ bin/console doctrine:schema:update
```

### Uruchomienie
Do celów deweloperskich zalecane jest użycie wbudowanego serwera www w projekt.

Uruchomienie z logami w konsoli:
```bash
$ bin/console server:run
```

Uruchomienie w tle:
```bash
$ bin/console server:start
```

## Twórcy
- Filip Nowacki [@fnowacki](https://github.com/fnowacki) 

Oraz [cała społeczność DevBay](https://github.com/devbay-pl/firma/graphs/contributors), która miała wkład w ten projekt.

___
Projekt oparty na [licencji MIT](https://github.com/devbay-pl/firma/blob/master/LICENSE).