# Ruční instalace [PHP knihovny Vyfakturuj API](https://github.com/redbitcz/vyfakturuj-api-php)

> **Doporučujeme, abyste namísto ruční instalace Vyfakturuj API využili [instalaci přes Composer](README.md#instalace)** 

Pokud nemůžete nebo nechcete [instalovat tuto knihovnu přes Composer](README.md#instalace), můžete si
stáhnout [poslední verzi v ZIP souboru](https://github.com/redbitcz/vyfakturuj-api-php/releases/latest).

Tento ZIP rozbalte, tuto složku pak nahrajte do svého webu a následně na začátek vašeho projektu (nejčastěji `index.php`)
přidejte kód pro načtení knihoven, přibližně v této podobě:
```php
require_once 'cesta-k-nahrane-slozce/simple-autoload.php';
```