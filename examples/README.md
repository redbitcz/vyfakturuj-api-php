# Příklady použití [PHP knihovny Vyfakturuj API](https://github.com/redbitcz/vyfakturuj-api-php)

## Příprava pro použití příkladů

Aby Vám níže uvedené příklady fungovaly, nastavte si nejdříve přihlášení do vašeho účtu.

V souboru [config.php](config.php) doplňte na označené místo Váš `login` a `API klíč`, které najdete
v [nastavení API ve Vyfakturuj](https://app.vyfakturuj.cz/nastaveni/api/).

## Příklady

### Test spojení na server

> Soubor: [test-connection.php](test-connection.php)

Otestuje připojení na server (musí se zobrazit welcome zpráva s datumem).

### Faktury

> Adresář [Invoice](Invoice)

Ukázky, jak vytvořit, upravit, číst, mazat či jinak pacovat s fakturami.

### Adresář a kontakty

> Adresář [Contact](Contact)

Ukázky jak pracovat s Vaším adresářem a kontakty v něm.

### Šablony a pravidelné faktury

> Adresář [Template](Template)

Ukázky, jak vytvořit, upravit, číst, mazat šablony a pravidelné faktury

### Nastavení

> Adresář [Settings](Settings)

Práce s číselnou řadou nebo platebními metodami.

### Ošetření chyb

> Soubor: [error-handle.php](error-handle.php)

Ukázka, jak ošetřit chyby, které mohou při použití knihovny vzniknout.
