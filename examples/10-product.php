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
    'name' => 'Testovací produkt '.date("YmdHis"),
    'type' => 9,
    'title' => 'Testovací produkt '.date("YmdHis"),
    'price' => 0,
    'store' => 10,
    'form_billing_config' => array(
        '7H6kZZPx' => array(
            'name' => '',
            'type' => '-email-',
            'grid' => '1',
            'required' => 4,
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
            'required' => 4,
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
    'X_1' => 123,
);

$ret = $vyfakturuj_api->createProduct($opt);

echo '<h5>Vytvořili jsme produkt:</h5>';
//echo '<pre><code class="json">'.(var_export($ret,true)).'</code></pre>';
echo '<pre><code class="json">' .htmlspecialchars(json_encode($ret, JSON_PRETTY_PRINT)) . '</code></pre>';

$opt = array(
    'name' => 'Testovací produkt '.date("YmdHis").' UPRAVENO',
);

$ret = $vyfakturuj_api->updateProduct($ret['id'], $opt);

echo '<h5>Upravili jsme produkt:</h5>';
//echo '<pre><code class="json">'.(var_export($ret,true)).'</code></pre>';
echo '<pre><code class="json">' . htmlspecialchars(json_encode($ret, JSON_PRETTY_PRINT)) . '</code></pre>';



$ret = $vyfakturuj_api->getProducts();

echo '<h5>Načetli jsme tyto produkty:</h5>';
echo '<pre><code class="json">'.htmlspecialchars(json_encode($ret,JSON_PRETTY_PRINT)).'</code></pre>';
