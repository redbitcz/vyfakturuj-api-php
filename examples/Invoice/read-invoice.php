<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID dokumentu

$inv3 = $vyfakturuj_api->getInvoice($id);

echo '<h1>Načetli jsme data o faktuře ze systému:</h1>';
echo '<pre><code class="json">' . json_encode($inv3, JSON_PRETTY_PRINT) . '</code></pre>';
