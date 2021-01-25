<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID pravidelné faktury

$opt = array(
    'name' => '#API + Test pravidelné faktury',// změníme název
    'items' => array(
        array(
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 21,// změníme DPH
        ),
        array(
            'text' => 'Kapalina do ostřikovačů 250 ml',
            'unit_price' => 59,
            'vat_rate' => 21,// změníme DPH
        )
    )
);

$ret2 = $vyfakturuj_api->updateTemplate($id, $opt);    // upravíme zaznam

echo '<h1>Upravili jsme pravidelnou fakturu:</h1>';
echo '<pre><code class="json">' . json_encode($ret2, JSON_PRETTY_PRINT) . '</code></pre>';
