# Příklady použití [PHP knihovny Vyfakturuj API](https://github.com/redbitcz/vyfakturuj-api-php)

## Příprava pro použití příkladů
Aby Vám níže uvedené příklady fungovaly, nastavte si nejdříve přihlášení do vašeho účtu. 

V souboru [00-config.php](00-config.php) doplňte na označené místo Váš `login` a `API klíč`,
které najdete v [nastavení API ve Vyfakturuj](https://app.vyfakturuj.cz/nastaveni/api/).
 
## Příklady

### 1. Test spojení na server
> Soubor: [01-test.php](01-test.php)

Otestuje připojení na server (musí se zobrazit welcome zpráva s datumem).

### 2. Faktury
> Soubor: [02-invoice.php](02-invoice.php)

Ukázka, jak vytvářet, updatovat, získávat a mazat faktury.

### 3. Kontakty
> Soubor: [03-contact.php](03-contact.php)

Ukázka, jak vytvářet, updatovat, získávat a mazat kontakty.

### 4. Šablony
> Soubor: [04-template.php](04-template.php)

Ukázka, jak vytvářet, updatovat, získávat a mazat pravidelné faktury a šablony.

### 5. Odeslání e-mailu s fakturou
> Soubor: [05-invoice-sendMail.php](05-invoice-sendMail.php)

Ukázka, jak odeslat e-mail s fakturou.

### 6. Uhrazení faktury
> Soubor: [06-invoice-setPayment.php](06-invoice-setPayment.php)

Ukázka, jak provést uhrazení faktury.

### 7. Zobrazení PDF
> Soubor: [07-test-invoice-download.php](07-test-invoice-download.php)

Ukázka, jak pracovat s funkci `test_invoice__asPdf()`. Tato funkce vrátí PDF aniž by uložila dokument (fakturu) do systému. Hodí se zejména pokud potřebujeme odladit vzhled faktury.

### 8. EET
> Soubor: [08-invoice-sendEET.php](08-invoice-sendEET.php)

Ukázka, jak poslat požadavek na zaúčtování dokladu v EET.

### 9. Vyhledávání faktur
> Soubor: [09-invoice_search.php](09-invoice_search.php)

Ukázka, jak vyhledávat v seznamu faktur.

### 10. Produkty
> Soubor: [10-product.php](10-product.php)

Ukázka, jak vyhledávat v seznamu produktů (SimpleShop.cz).

### 11. Platební metody
> Soubor: [11-payment-method.php](11-payment-method.php)

Ukázka, jak získat seznam platebních metod (způsobů uhrady).

### 12. Číselné řady
> Soubor: [12-number-series.php](12-number-series.php)

Ukázka, jak získat seznam číslených řad.

### 13. Ošetření chyb
> Soubor: [13-error-handle.php](13-error-handle.php)

Ukázka, jak ošetřit chyby, které mohou při použití knihovny vzniknout.
