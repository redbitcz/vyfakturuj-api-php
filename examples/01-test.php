<?php

require_once __DIR__ . '/00-config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$result = $vyfakturuj_api->test();

echo '<h2>Test připojení k serveru:</h2>';
echo '<pre>' . print_r($result, true) . '</pre>';


exit;
