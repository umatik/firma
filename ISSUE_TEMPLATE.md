## Typ zgłoszenia:
 * [Chcę zgłosić buga](#bug)
 * [Chcę zadać pytanie](#pytanie)
 * [Mam pomysł na nową funkcjonalność](#żądanie-funkcjonalności)
 * [Nowa funkcja/poprawa wydajności/modyfikacja kodu/etc](#ulepszenie)
 
## Szablony
### Bug
#### Szablon
```markdown
### Odtworzenie buga(kroki postępowania)
1.
2.
3.
4.

### Platforma
**Wersja przeglądarki**: 

**System**: 

**Wersja aplikacji**: 

### Screenshot/GIF


### Oczekiwane zachowanie


### Obecne zachowanie


```

#### Przykład
```markdown
### Odtworzenie buga(kroki postępowania)
1. Loguję się
2. Wchodzę na stronę devbay.pl/xxx
3. Klikam w przycisk "Pobierz" i czekam kilka sekund
4. Dostaję 500 z następującym błędem:
> RuntimeException in ClassCollectionLoader.php line 239:
Failed to write cache file "/var/www/devbay_firma/app/cache/dev/classes.php".

### Platforma
**Wersja przeglądarki**: Google Chrome Wersja 62.0.3202.94 (Oficjalna wersja) (64-bitowa)

**System**: macOS High Sierra 10.13.2

**Wersja aplikacji**: v1.0.0

### Screenshot/GIF
Nie wymagany

### Oczekiwane zachowanie
Po wcisnięciu "Pobierz" spodziewałem się pobrania pliku pdf z ebookiem.

### Obecne zachowanie
Po wciśnięciu "Pobierz" dostaję błąd 500 wraz z stacktrace, plik się nie pobiera.

```

---

### Pytanie
#### Szablon
```markdown
**Czego dotyczy pytanie**: 

**Treść**:

**Screenshot/GIF**:

```
#### Przykład
```markdown
**Czego dotyczy pytanie**: Moduł wystawiania faktur

**Treść**: W jaki sposób mogę zmienić sposób numeracji faktur z rocznych na miesięczne? Czy dotychczasowe faktury zachowają swoją numerację?

**Screenshot/GIF**: brak

```
---

### Żądanie funkcjonalności
#### Szablon
```markdown
**Zajawka funkcjonalności**:

**Szczegółowy opis**:

**Przykłady**:

**Makieta**:

```
#### Przykład
```markdown
**Zajawka funkcjonalności**: Top 3 najaktywniejszych użytkowników na stronie głównej.

**Szczegółowy opis**: Jako użytkownik chciałbym zobaczyć na stronie głównej 3 najaktywniejszych użytkowników w miesiącu.

**Przykłady**: w makiecie

**Makieta**: 
!(Makieta)[https://i.imgur.com/lGgg4gO.png]

```
---

### Ulepszenie
### Szablon
```markdown
**Opis ulepszenia**: 

**Przed**:

**Po**:

Link do pull requesta: 
```

### Przykład
```markdown
**Opis ulepszenia**: Optymalizacja zapytań do bazy danych.

**Przed**: Średni czas zapytania to 19,5 sekundy

**Po**: Średni czas zapytania zmneijszył się do 100 ms

Link do pull requesta: 
```