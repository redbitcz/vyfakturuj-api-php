<?php


#
##########################
#                        #
#   !!! DEPRECATED !!!   #
#                        #
##########################
#
#
# Tento kód nedoporučujeme používat. API pro vytváření produktu není zatím finální a bude se v budoucnu určitě výrazně měnit.
# Při jeho použití vemte prosím tuto skutečnost na vědomí se všemi následky.
#

require_once __DIR__ . '/00-config.php';

echo "<h2>Vyhledání produktů</h2>\n";

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$opt = array(
    'name' => 'Testovací produkt ' . date("YmdHis"),
    'type' => 9,
    'title' => 'Testovací produkt ' . date("YmdHis"),
    'price' => 0,
    'store' => 10,
    'amount_type' => 1, // "1" => ✔ Zobrazit políčko pro zadání množství | "2" => ⛒ Schovat políčko pro zadání množství
    'coupon_type' => 1, // "2" => ⛒ Skryto - políčko se nezobrazuje. Slevové kupóny nelze uplatnit. | "1" => ✔ Zobrazeno - zákazníci mohou uplatnit slevové kupóny.
    'amountType' => 1, // 1 => ✔ Zobrazit políčko pro zadání množství | 2 => ⛒ Schovat políčko pro zadání množství
    'form_text_header_main' => '', // Hlavní nadpis
    'form_text_header_payment_method' => '', // Nadpis pro výběr platební metody
    'form_text_header_billing' => '', // Nadpis pro zadání fakturačních údajů
    'form_text_button_send' => '', // Tlačítko pro odeslání formuláře
    'form_billing_config' => array(
        '7H6kZZPx' => array(
            'name' => '',
            'type' => '-email-',
            'grid' => '1',
            'required' => 4, // "2" => ⛒ Skryto - políčko se nezobrazuje | "1" => ✔ Zobrazeno - může i nemusí být vyplněno | "9" => ✔ Zobrazeno - může i nemusí být vyplněno + skrýt, pokud je částka na 0 | "4" => ✱ Povinné - musí být vyplněno | "12 => >✱ Povinné - musí být vyplněno + skrýt, pokud je částka na 0
            'id' => '7H6kZZPx',
        ),
        'Wqizeafd' => array(
            'name' => '',
            'type' => '-firstname-',
            'grid' => '1',
            'required' => 2,
            'id' => 'Wqizeafd',
        ),
        '7xxqE0DR' => array(
            'name' => '',
            'type' => '-lastname-',
            'grid' => '1',
            'required' => 2,
            'id' => '7xxqE0DR',
        ),
        'J64DFa8C' => array(
            'name' => '',
            'type' => '-company-',
            'grid' => '1',
            'required' => 2,
            'id' => 'J64DFa8C',
        ),
        'I5NyVsWH' => array(
            'name' => '-none-',
            'type' => '-address-',
            'grid' => '1',
            'required' => 2,
            'id' => 'I5NyVsWH',
        ),
        'J47N5cR3' => array(
            'name' => '-none-',
            'type' => '-ic-dic-',
            'grid' => '1',
            'required' => 2,
            'id' => 'J47N5cR3',
        ),
        'Aej45MMF' => array(
            'name' => '',
            'type' => '-tel-',
            'grid' => '1',
            'required' => 2,
            'id' => 'Aej45MMF',
        ),
        'JH8eH7Hg' => array(
            'name' => '',
            'type' => '-note-',
            'grid' => '1',
            'required' => 2,
            'id' => 'JH8eH7Hg',
        ),
    ),
    'form_person_enable' => 1,
    'form_person_config' => array(
        '2kENDqlc' => array(
            'name' => '',
            'type' => '-firstname-',
            'grid' => '1',
            'required' => 4, // "2" => ⛒ Skryto - políčko se nezobrazuje | "1" => ✔ Zobrazeno - může i nemusí být vyplněno | "9" => ✔ Zobrazeno - může i nemusí být vyplněno + skrýt, pokud je částka na 0 | "4" => selected="">✱ Povinné - musí být vyplněno
            'id' => '2kENDqlc',
        ),
        'liQglxaL' => array(
            'name' => '',
            'type' => '-lastname-',
            'grid' => '1',
            'required' => 4,
            'id' => 'liQglxaL',
        ),
        'CjGxVj3v' => array(
            'name' => '',
            'type' => '-email-',
            'grid' => '1',
            'required' => 4,
            'id' => 'CjGxVj3v',
        ),
    ),
    'url_product' => 'http://www.google.com', // URL po uhrazení
    'sentence' => [
        [
            'type' => 2, // "1" => Text | "2" => selected="">Checkbox | "4" => Povinný checkbox | "8" => Obchodní podmínky
            'text' => 'Objednávkou souhlasíte s obchodními podmínkami, kde je i vše k osobním údajům',
            'url' => ' https://elegal.cz/obchodni-podminky-skoleni-elegal',
        ],
    ],
    'form_html_code' => '<link href="https://mydomain.tld/style.css" type="text/css" rel="stylesheet">' .
        '<script type="text/javascript" src="https://mydomain.tld/javascript.js"></script>',
    'X_1' => 123,
);

$ret = $vyfakturuj_api->createProduct($opt);

echo '<h5>Vytvořili jsme produkt:</h5>';
//echo '<pre><code class="json">'.(var_export($ret,true)).'</code></pre>';
echo '<pre><code class="json">' . htmlspecialchars(json_encode($ret, JSON_PRETTY_PRINT)) . '</code></pre>';

$opt = array(
    'name' => 'Testovací produkt ' . date("YmdHis") . ' UPRAVENO',
);

$ret = $vyfakturuj_api->updateProduct($ret['id'], $opt);

echo '<h5>Upravili jsme produkt:</h5>';
//echo '<pre><code class="json">'.(var_export($ret,true)).'</code></pre>';
echo '<pre><code class="json">' . htmlspecialchars(json_encode($ret, JSON_PRETTY_PRINT)) . '</code></pre>';


$ret = $vyfakturuj_api->getProducts();

echo '<h5>Načetli jsme tyto produkty:</h5>';
echo '<pre><code class="json">' . htmlspecialchars(json_encode($ret, JSON_PRETTY_PRINT)) . '</code></pre>';
