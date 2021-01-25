<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$ret = $vyfakturuj_api->getTemplates(
    [
        'type' => 2,
        'end_type' => 1
    ]
);

echo '<h1>Nalezené pravidelné faktury a šablony</h1>';
echo '<pre><code class="json">' . json_encode($ret, JSON_PRETTY_PRINT) . '</code></pre>';
