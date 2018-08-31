# PHP knihovna pro Vyfakturuj API

## Dokumentace
**Dokumentace API** je publikována na Apiary: http://docs.vyfakturujcz.apiary.io/

Další informace o Vyfakturuj API: https://www.vyfakturuj.cz/api/

## Instalace
Nainstalujte knihovnu pomocí Composeru (doporučujeme):
```shell
composer require vyfakturuj/vyfakturuj-api-php
```
Případně si můžete [stáhnout poslední verzi v ZIP souboru](https://github.com/vyfakturuj/vyfakturuj-api-php/releases/latest).

Ve své aplikaci pak jednoduše vytvoříte objekt `VyfakturujAPI`:
```php
$vyfakturuj = new VyfakturujAPI('login', 'API klíč');
```
Váš `login` a `API klíč` najdete v [nastavení API ve Vyfakturuj](https://app.vyfakturuj.cz/nastaveni/api/).

Nad tímto objektem pak můžete přímo volat metody:
```php
$invoice = $vyfakturuj->getInvoice(1234567);
```

## Požadavky
Knihovna pro správné fungování potřebuje:
- PHP verze 5.3 a vyšší
- Rozšíření cURL
- Rozšíření JSON

## Příklady použití
Příklady použití knihovny jsou [popsány ve složce `examples`](/examples/#readme).

## Changelog
Přehled verzí a změn: https://github.com/vyfakturuj/vyfakturuj-api-php/releases