<?php

require_once __DIR__ . '/00-config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$inv = $vyfakturuj_api->getSettings_numberSeries();

echo '<h2>Načetli jsme tyto data:</h2>';
echo '<pre>' . print_r($inv, true) . '</pre>';


exit;
