<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$ret = $vyfakturuj_api->getTemplates(); // vrati vsechny sablony a pravidelné faktury

echo '<h1>Pravidelné faktury a šablony</h1>';
echo '<pre><code class="json">' . json_encode($ret, JSON_PRETTY_PRINT) . '</code></pre>';
