# DevBay Community - Firma
[![Build Status](https://travis-ci.org/devbay-pl/firma.svg?branch=master)](https://travis-ci.org/devbay-pl/firma)

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

Aby zbudować część frontową:
```bash
$ npm install
$ npm run dev
```
Aby npm przebudowywał na bieżąco zmiany zamiast `npm run dev` uruchom `npm run watch`.

Po uruchomieniu środowiska dockerowego należy utworzyć schematy w bazie danych poleceniem:

```bash
$ bin/console doctrine:schema:update
```

### Uruchomienie
Do celów deweloperskich zalecane jest użycie przygotowanego środowiska dockerowego.
By uruchomić:
```bash
$ docker-compose up
```

Przy pierwszym uruchomieniu i przy każdej zmianie konfiguracji dockera dodaj parametr `--build`.

Dla tych, którzy wolą wbudowany serwer www:

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
Projekt na [licencji MIT](https://github.com/devbay-pl/firma/blob/master/LICENSE).