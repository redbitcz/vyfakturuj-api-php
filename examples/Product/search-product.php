<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$opt = array(
    'date_created_from' => '2016-10-01',
    'date_created_to' => '2016-10-31',
);

$ret = $vyfakturuj_api->getProducts($opt);

echo '<h1>Získali jsme následující produkty:</h1>';
echo '<pre><code class="json">' . json_encode($ret, JSON_PRETTY_PRINT) . '</code></pre>';
