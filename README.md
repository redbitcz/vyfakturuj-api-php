# Vyfakturuj API PHP
Příhlady API napojení na aplikaci Vyfakturuj.cz v programovacím jazyce PHP

## Postup instalace
1. V souboru /examples/config.php doplnit potřebné údaje
2. Spustit /examples/1-test.php a otestovat připojení na server (musí se zobrazit welcome zpráva s datumem)
3. V souboru /examples/2-invoice.php se nachází ukázka, jak vytvářet, updatovat, získávat a mazat faktury
4. V souboru /examples/3-contact.php se nachází ukázka, jak vytvářet, updatovat, získávat a mazat kontakty
5. V souboru /examples/4-template.php se nachází ukázka, jak vytvářet, updatovat, získávat a mazat pravidelné faktury a šablony
6. V souboru /examples/5-invoice-sendMail.php se nachází ukázka, jak odeslat e-mail s fakturou
7. V souboru /examples/6-invoice-setPayment se nachází ukázka, jak provést uhrazení faktury


## Changelog

### Verze 2.1.2

+ Možnost uhradit doklad (fakturu)
+ Popora souvisejících dokladů (faktur) v odpovědích

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