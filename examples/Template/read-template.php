<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID pravidelné faktury

$ret = $vyfakturuj_api->getTemplate($id);

echo '<h1>Načetli jsme data o pravidelné faktuře faktuře ze systému:</h1>';
echo '<pre><code class="json">' . json_encode($ret, JSON_PRETTY_PRINT) . '</code></pre>';
