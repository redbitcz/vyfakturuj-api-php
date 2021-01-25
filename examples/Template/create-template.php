<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

/*
 * Některá čísla v příkladu níže jsou číselná označení systémových typů.
 * Například: 'type' => 2 znamená, že vytváříme Pravidelnou fakturu, nikoliv jen Šablonu.
 * Popis všech hodnot najdete v dokumentaci: https://vyfakturujcz.docs.apiary.io/#reference/sablony,-pravidelne-faktury
 * Zkušenější uživatelé mohou použít výčet možných hodnot v přiložené třídě VyfakturujEnum.
 */
$opt_template = array(
    'id_customer' => 123,// ID existujícího kontaktu
    'type' => 2,// Jedná se o pravidelnou fakturu, nikoliv o šablonu
    'name' => '#API - Test pravidelné faktury',
    'items' => array(
        array(
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 15,
        ),
        array(
            'text' => 'Kapalina do ostřikovačů 250 ml',
            'unit_price' => 59,
            'vat_rate' => 15,
        )
    )
);

$ret = $vyfakturuj_api->createTemplate($opt_template);    // vytvoříme novou pravidelnou fakturu

echo '<h1>Vytvořili jsme pravidelnou fakturu:</h1>';
echo '<pre><code class="json">' . json_encode($ret, JSON_PRETTY_PRINT) . '</code></pre>';
