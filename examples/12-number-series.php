<?php

use Redbit\Vyfakturuj\Api\VyfakturujApi;

require_once __DIR__ . '/00-config.php';
echo "<h2>Číselné řady</h2>\n";

$vyfakturuj_api = new VyfakturujApi(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$inv = $vyfakturuj_api->getSettings_numberSeries();

echo '<h5>Načetli jsme tyto data:</h5>';
echo '<pre><code class="json">' . json_encode($inv, JSON_PRETTY_PRINT) . '</code></pre>';
