<?php

use Redbit\Vyfakturuj\Api\VyfakturujApi;

require_once __DIR__ . '/00-config.php';

echo "<h2>Vyhledání produktů</h2>\n";

$vyfakturuj_api = new VyfakturujApi(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$opt = array(
    'date_created_from' => '2016-10-01',
    'date_created_to' => '2016-10-31',
);


$ret = $vyfakturuj_api->getProducts($opt);

echo '<h5>Načetli jsme tyto produkty:</h5>';
echo '<pre><code class="json">' . json_encode($ret, JSON_PRETTY_PRINT) . '</code></pre>';
