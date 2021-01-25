<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID dokumentu

$opt = array(
    'customer_name' => 'Ukázková Firma po úpravě',// Změníme název
    'items' => array(// odstraníme druhou položku a necháme jen jednu
        array(
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 15,
        ),
    )
);

$inv2 = $vyfakturuj_api->updateInvoice($id, $opt);    // upravíme fakturu

echo '<h1>Upravili jsme fakturu:</h1>';
echo '<pre><code class="json">' . json_encode($inv2, JSON_PRETTY_PRINT) . '</code></pre>';

