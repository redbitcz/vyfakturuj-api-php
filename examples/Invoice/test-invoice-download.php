<?php

require_once __DIR__ . '/00-config.php';

echo "<h2>Stažení faktury v PDF</h2>\n";

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$opt = array(
    'customer_IC' => '123456789',
    'customer_DIC' => 'CZ123456789',
    'customer_name' => 'Ukázková Firma',
    'customer_street' => 'Pouliční 79/C',
    'customer_city' => 'Praha',
    'customer_zip' => '10300',
    'customer_country_code' => 'CZ',
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
    )
);

$result = $vyfakturuj_api->test_invoice__asPdf($opt);

echo '<h5>Nepodařilo se stáhnout PDF:</h5>';
echo '<pre><code class="json">' . json_encode($result, JSON_PRETTY_PRINT) . '</code></pre>';
