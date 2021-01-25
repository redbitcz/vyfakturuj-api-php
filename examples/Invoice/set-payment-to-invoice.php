<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID dokumentu
$dateOfPayment = '2016-07-25'; // Datum úhrady


$res = $vyfakturuj_api->invoice_setPayment($id, $dateOfPayment);

echo '<h1>Doklad po uhrazení:</h1>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';
