# Rozwój
:+1::tada: W pierwszej kolejności, wielkie dzięki, że rozważasz wsparcie tego projektu :tada::+1:

### Spis treści
[Najważniejsze rzeczy](#najważniejsze-rzeczy)

[Jak mogę pomóc?](#jak-mogę-pomóc)
 * [Zgłaszanie bugów](#zgłaszanie-bugów)
 * [Proponowanie usprawnień](#proponowanie-usprawnień)
 * [Pull Requesty](#pull-requesty)
 * [Pierwszy raz...](#pierwszy-raz)
 
[Nasz styleguide](#nasz-styleguide)
 * [Treść commitów](#treść-commitów)
 * [PHP](#php)

[Dodatkowe informacje](#dodatkowe-informacje)

## Najważniejsze rzeczy
- dokumentacja
- bugi
- komunikator - [dołącz do naszego slacka](https://join.slack.com/t/devbaypl/shared_invite/enQtMjk0ODE3ODM2MzQzLWQ2Yjg5YWQzNTk0MTJlMzgzNWEwMGQzMmYwMmMzZDdjNTgyYzM5MDRiNDliZGMxYjQ5M2MzZjljNDIyZTI3YWQ), kanał #github_firma

## Jak mogę pomóc?
### Zgłaszanie bugów
W tej sekcji znajdziesz informacje o tym, jak zgłosić buga w projekcie. Postępowanie zgodnie z tymi zaleceniami pomoże naszej ekipie zrozumieć Twoje zgłoszenie :pencil:, odtworzyć zachowanie :computer: :computer: oraz znaleźć powiązane zgłoszenia :mag_right:.

Zanim zgłosisz buga, prosimy byś zapoznał się z [tą listą](#zanim-zgłosisz-buga), ponieważ może się okazać, że wcale nie musisz tego zgłaszać. Tworząc zgłoszenie, prosimy byś umieścił [jak najwięcej szczegółów](#jak-wysłać-dobre-zgłoszenie).

> **Uwaga:** jeśli znajdziesz zamknięty problem, który wygląda na podobny, jak Twój, owtórz nowe zgłoszenie i dołącz link do tego, które jest zamknięte.

#### Zanim zgłosisz buga
- Przede wszystkim [przeszukaj istniejące już bugi](https://github.com/search?q=+is%3Aissue+user%3Adevbay-pl) w poszukiwaniu podobnego.
- Upewnij się, że jesteś na najnowszej wersji projektu

#### Jak wysłać dobre zgłoszenie?
Do obsługi błędów korzystamy z [githubowego rozwiązania](https://guides.github.com/features/issues/).

Wyjaśnij problem i szczegółowo opisz o co chodzi, by nasz zespół mógł odtworzyć zaistaniały błąd.

- Używaj krótkiego i merytorycznego tytułu zgłoszenia
- Opisz każdy krok, który wykonujesz by napotkać problem
- Podaj konkretne przykłady aby zademonstrować kroki, które przechodzisz
- Dołącz screenshoty lub gify, by dokładnie pokazać błąd. Do nagrywania gifów możesz użyć [tego narzędzia](https://www.cockos.com/licecap/) - macOS i Windows, [tego](https://github.com/colinkeenan/silentcast) lub [tego](https://github.com/GNOME/byzanz) na Linuxie.

@todo dopisać...

### Proponowanie usprawnień
W tej sekcji przedstawiamy jak proponować usprawnienia projektu, w tym zupełnie nowe funkcje i drobne ulepszenia istniejących funkcji. Przestrzeganie tych wskazówek pomaga nam zrozumieć Twoją propozycję :pencil: i znaleźć :mag_right: powiązane z nią już zgłoszone propozycje.

Podczas tworzenia propozycji usprawnienia należy podać jak najwięcej szczegółów.

### Pull Requesty
- Uzupełnij wymagany szablon(@todo)
- Nie podawaj numeru zgłoszenia w tytule PR
- Dołącz screenshot lub gif jeśli jest to możliwe
- Przestrzegaj standardów [naszego styleguide](#nasz-styleguide)
- Wszystkie pliki powinny mieć na końcu jedną wolną linię
- [Unikaj zależności danego systemu](https://flight-manual.atom.io/hacking-atom/sections/cross-platform-compatibility/)

### Pierwszy raz...
Nie wiesz od czego zacząć? Proponujemy rozejrzeć się wśród zgłoszeń `dla świeżaków` oraz `potrzebna pomoc`.
- [dla świeżaków](https://github.com/search?utf8=✓&q=is%3Aopen+is%3Aissue+label%3A%22dla+świeżaków%22+label%3A%22potrzebna+pomoc%22+user%3Adevbay-pl+sort%3Acomments-desc&type=Issues) - zgłoszenia, które wymagają jedynie kilku linijek kodu, testu, góra dwa
- [potrzebna pomoc](https://github.com/search?utf8=✓&q=is%3Aopen+is%3Aissue+label%3A%22dla+świeżaków%22+label%3A%22potrzebna+pomoc%22+user%3Adevbay-pl+sort%3Acomments-desc&type=Issues) - zgłoszenia nieco bardziej skomplikowanie niż `dla świeżaków`

## Nasz styleguide
### Treść commitów
- Używaj formy "Dodanie czegoś" zamiast np. "...dodano..."
- Treść commitów piszemy po polsku
- Ograniczaj długość pierwszej linii do 72 znaków
- Wszelkie linki, referencje i zgłoszenia umieszczaj poza 1 linią treści commita
- Dla większej czytelności rozważ stosowanie symbolu emoji jako pierwszego znaku treści
  - :art: `:art:` kiedy refactorujesz kod
  - :racehorse: `:racehorse:` kiedy poprawiasz wydajność
  - :non-potable_water: `:non-potable_water:` kiedy usuwasz wycieki pamięci
  - :memo: `:memo:` kiedy piszesz dokumentację
  - :penguin: `:penguin:` kiedy poprawiasz coś w Linuxie
  - :apple: `:apple:` kiedy naprawiasz coś związanego z macOS
  - :checkered_flag: `:checkered_flag:` kiedy poprawiasz coś na Windowsie
  - :bug: `:bug:` kiedy poprawiasz buga
  - :fire: `:fire:` kiedy usuwasz kod lub pliki
  - :green_heart: `:green_heart:`  kiedy naprawiasz CI 
  - :white_check_mark: `:white_check_mark:` kiedy dodajesz testy
  - :lock: `:lock:` kiedy robisz cokolwiek związanego z bezpieczeństwem
  - :arrow_up: `:arrow_up:` kiedy podnosisz zależności
  - :arrow_down: `:arrow_down:` kiedy obniżasz zależności
  - :shirt: `:shirt:` kiedy poprawiasz ostrzeżenia linterów i inspektorów kodu

### PHP
W projekcie podążamy [standardami kodowania zgodnymi z Symfony 4](http://fabien.potencier.org/symfony4-best-practices.html).

## Dodatkowe informacje
### Labelki zgłoszeń
| Label | Opis |
| --- | --- |
| `bug` | Potwierdzone bugi lub zgłoszenia, które najprawdopodobniej są bugami |
| `dla świeżaków` | Zadania z niskim poziomem skomplikowania, nadają się w sam raz na start |
| `duplikat` | Zgłoszenia, które są duplikowane z już istniejącymi |
| `nie będzie naprawiane` | Zgłoszenia, które z jakiegoś powodu nie będą naprawiane |
| `nieaktualny` | Zgłoszenie, które uległo przedawnieniu, bądź nie idzie powtórzyć buga |
| `potrzebna pomoc` | Zadania nieco trudniejsze niż `dla świeżaków` |
| `pytanie` | Pytania, które nie są ani bugami ani żądaniem funkcjonalności, np. "jak zrobić X?" |
| `żądanie funkcjonalności` | Zadania, których celem jest zgłoszenie zapotrzebowania na daną funkcjonalność |
| `ulepszenie` | Wszelkie funkcjonalności |

### Labelki Pull Requestów
