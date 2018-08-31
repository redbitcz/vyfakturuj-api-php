# Příklady použití [PHP knihovny Vyfakturuj API](https://github.com/vyfakturuj/vyfakturuj-api-php)

## Příprava pro použití příkladů
V na začátku souboru [/examples/config.php](config.php) doplňte na označené místo Váš `login` a `API klíč`,
které najdete v [nastavení API ve Vyfakturuj](https://app.vyfakturuj.cz/nastaveni/api/).
 
## Příklady

### 1. Test spojení na server
> Soubor: [/examples/1-test.php](1-test.php)

Otestuje připojení na server (musí se zobrazit welcome zpráva s datumem).

### 2. Faktury
> Soubor: [/examples/2-invoice.php](2-invoice.php)

Ukázka, jak vytvářet, updatovat, získávat a mazat faktury.

### 3. Kontakty
> Soubor: [/examples/3-contact.php](3-contact.php)

Ukázka, jak vytvářet, updatovat, získávat a mazat kontakty.

### 4. Šablony
> Soubor: [/examples/4-template.php](4-template.php)

Ukázka, jak vytvářet, updatovat, získávat a mazat pravidelné faktury a šablony.

### 5. Odeslání e-mailu s fakturou
> Soubor: [/examples/5-invoice-sendMail.php](5-invoice-sendMail.php)

Ukázka, jak odeslat e-mail s fakturou.

### 6. Uhrazení faktury
> Soubor: [/examples/6-invoice-setPayment.php](6-invoice-setPayment.php)

Ukázka, jak provést uhrazení faktury.

### 7. Zobrazení PDF
> Soubor: [/examples/7-test-invoice-download.php](7-test-invoice-download.php)

Ukázka, jak pracovat s funkci `test_invoice__asPdf()`. Tato funkce vrátí PDF aniž by uložila dokument (fakturu) do systému. Hodí se zejména pokud potřebujeme odladit vzhled faktury.

### 8. EET
> Soubor: [/examples/8-invoice-sendEET.php](8-invoice-sendEET.php)

Ukázka, jak poslat požadavek na zaúčtování dokladu v EET.

### 9. Vyhledávání faktur
> Soubor: [/examples/9-invoice_search.php](9-invoice_search.php)

Ukázka, jak vyhledávat v seznamu faktur.

### 10. Produkty
> Soubor: [/examples/a-product.php](a-product.php)

Ukázka, jak vyhledávat v seznamu produktů (SimpleShop.cz).

### 11. Platební metody
> Soubor: [/examples/b-payment-method.php](b-payment-method.php)

Ukázka, jak získat seznam platebních metod (způsobů uhrady).

### 12. Číselné řady
> Soubor: [/examples/c-number-series.php](c-number-series.php)

Ukázka, jak získat seznam číslených řad.
