<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID dokumentu

$res = $vyfakturuj_api->deleteInvoice($id);

echo '<h1>Načetli jsme data o průběhu smazání faktury ze systému:</h1>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';
