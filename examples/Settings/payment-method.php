<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$inv = $vyfakturuj_api->getSettings_paymentMethods();

echo '<h1>Platební metody</h1>';
echo '<pre><code class="json">' . json_encode($inv, JSON_PRETTY_PRINT) . '</code></pre>';
