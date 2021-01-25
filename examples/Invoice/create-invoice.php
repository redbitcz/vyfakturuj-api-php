<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

/*
 * Některá čísla v příkladu níže jsou číselná označení systémových typů.
 * Například: 'type' => 1 znamená, že vytvořený doklad bude Faktura a nikoliv třeba Výzva k platbě.
 * Popis všech hodnot najdete v dokumentaci: https://vyfakturujcz.docs.apiary.io/#reference/faktury
 * Zkušenější uživatelé mohou použít výčet možných hodnot v přiložené třídě VyfakturujEnum.
 */
$opt = array(
    'type' => 1,
    'calculate_vat' => 2,
    'payment_method' => 2,
    'customer_IC' => '123456789',
    'customer_DIC' => 'CZ123456789',
    'customer_name' => 'Ukázková Firma',
    'customer_street' => 'Pouliční 79/C',
    'customer_city' => 'Praha',
    'customer_zip' => '10300',
    'customer_country_code' => 'CZ',
    'currency' => 'EUR',
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
        ),
        array(
            'text' => 'Doprava',
            'unit_price' => 0,
            'vat_rate' => 0,
        )
    ),
    'action_after_create_send_to_eet' => true
);

$inv = $vyfakturuj_api->createInvoice($opt);    // vytvoříme novou fakturu

echo '<h1>Vytvořili jsme fakturu:</h1>';
echo '<pre><code class="json">' . json_encode($inv, JSON_PRETTY_PRINT) . '</code></pre>';
