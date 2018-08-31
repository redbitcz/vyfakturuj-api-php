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
1. V souboru /examples/config.php doplnit potřebné údaje
2. Spustit /examples/1-test.php a otestovat připojení na server (musí se zobrazit welcome zpráva s datumem)
3. V souboru /examples/2-invoice.php se nachází ukázka, jak vytvářet, updatovat, získávat a mazat faktury
4. V souboru /examples/3-contact.php se nachází ukázka, jak vytvářet, updatovat, získávat a mazat kontakty
5. V souboru /examples/4-template.php se nachází ukázka, jak vytvářet, updatovat, získávat a mazat pravidelné faktury a šablony
6. V souboru /examples/5-invoice-sendMail.php se nachází ukázka, jak odeslat e-mail s fakturou
7. V souboru /examples/6-invoice-setPayment.php se nachází ukázka, jak provést uhrazení faktury
8. V souboru /examples/7-test-invoice-download.php se nachází ukázka, jak pracovat s funkci test_invoice__asPdf(). Tato funkce vrátí PDF aniž by uložila dokument (fakturu) do systému. Hodí se zejména pokud potřebujeme odladit vzhled faktury
9. V souboru /examples/8-invoice-sendEET.php se nachází ukázka, jak poslat požadavek na zaúčtování dokladu v EET
10. V souboru /examples/9-invoice_search.php se nachází ukázka, jak vyhledávat v seznamu faktur
11. V souboru /examples/a-product.php se nachází ukázka, jak vyhledávat v Seznamu produktů (SimpleShop.cz)
12. V souboru /examples/b-payment-method.php se nachází ukázka, jak získat seznam platebních metod (způsobů uhrady)
32. V souboru /examples/c-number-series.php se nachází ukázka, jak získat seznam číslených řad

## Changelog
Přehled verzí a změn: https://github.com/vyfakturuj/vyfakturuj-api-php/releases