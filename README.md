# PHP knihovna pro Vyfakturuj API

## Dokumentace
**Dokumentace API** je publikována na Apiary: http://docs.vyfakturujcz.apiary.io/

Další informace o Vyfakturuj API: https://www.vyfakturuj.cz/api/

## Instalace
Nainstalujte knihovnu pomocí Composeru (doporučujeme):
```shell
composer require vyfakturuj/vyfakturuj-api-php
```
a následně na začátek vašeho projektu (nejčastěji `index.php`) přidejte kód pro načtení závislostí:
```php
require __DIR__ . '/vendor/autoload.php';
```

Případně si můžete [stáhnout poslední verzi v ZIP souboru](manual-installation.md).

**Důležité:** Pokud ve svém projektu již používáte Vyfakturuj, nebo [SimpleShop](https://www.simpleshop.cz/)
(např. [WordPress plugin](https://www.simpleshop.cz/category/wordpress-plugin/)), ujistěte se, že nemáte knihovnu
v projektu vícekrát. 

Ve své aplikaci pak jednoduše vytvoříte objekt `Redbit\Vyfakturuj\Api\VyfakturujApi`:
```php
$vyfakturuj = new \Redbit\Vyfakturuj\Api\VyfakturujApi('login', 'API klíč');
```
Váš `login` a `API klíč` najdete v [nastavení API ve Vyfakturuj](https://app.vyfakturuj.cz/nastaveni/api/).

Nad tímto objektem pak můžete přímo volat metody:
```php
$invoice = $vyfakturuj->getInvoice(1234567);
```

## Požadavky
Knihovna pro správné fungování potřebuje:
- PHP verze 7.1 a vyšší
- Rozšíření cURL
- Rozšíření JSON

## Příklady použití
Příklady použití knihovny jsou [popsány ve složce `examples`](/examples/#readme).

## Changelog
Přehled verzí a změn: https://github.com/redbitcz/vyfakturuj-api-php/releases