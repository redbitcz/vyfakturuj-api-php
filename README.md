# Vyfakturuj API PHP

Příklady API napojení na aplikaci [Vyfakturuj.cz](https://www.vyfakturuj.cz/) v programovacím jazyce PHP

Podrobnou dokumentace k API najdete na [http://docs.vyfakturujcz.apiary.io/](http://docs.vyfakturujcz.apiary.io/)

## Postup instalace
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

### Verze 2.1.6

+ Čtení nastavení platebních metod (způsobů úhrady) přes getSettings_paymentMethods()
+ Čtení nastavení číslených řad přes getSettings_numberSeries()
+ Podpora pro SimpleShop - čtení prodůktů přes getProducts($args)


### Verze 2.1.5

+ Podpora EET
+ Manuální odeslání do EET přes invoice_sendEet($id)
+ Pro API byla vyčleněna nová URL https://api.vyfakturuj.cz/2.0/ (původní je stále funkční)
+ Ve fci invoice_setPayment($id,$date = null,$amount = null) je nově $date jako volitelný parametr

### Verze 2.1.4

+ Možnost filtrace v seznamu faktur přes getInvoices(array('id_customer' => 123))
+ Možnost filtrace v seznamu kontaktů přes getContacts(array('mail_to' => 'info@vyfakturuj.cz'))
+ Možnost filtrace v seznamu šablon a pravidelných faktur přes getTemplates(array('type' => 2,'end_type' => 1))

### Verze 2.1.3

+ Přidání podpůrné funkce test_invoice__asPdf() - vytvoření faktury a stažení v PDF bez uložení v systému

### Verze 2.1.2

+ Možnost uhradit doklad (fakturu)
+ Podpora souvisejících dokladů (faktur) v odpovědích

### Verze 2.1.1

+ Možnost odeslat fakturu e-mailem přes API

### Verze 2.1.0

+ Vytváření, úprava, čtení a mazání kontaktů
+ Vytváření, úprava, čtení a mazání šablon
+ Vytváření, úprava, čtení a mazání pravidelných faktur
+ Mazání faktur

### Verze 2.0.0

+ Připojení na server
+ Vytváření, úprava a čtení faktur