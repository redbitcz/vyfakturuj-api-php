<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID dokumentu

$res = $vyfakturuj_api->invoice_sendEet($id);

echo '<h1>Dokument byl odeslán do EET:</h1>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';
