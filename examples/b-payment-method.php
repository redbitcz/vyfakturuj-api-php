<?php

include(__DIR__.'/config.php');

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN,VYFAKTURUJ_API_KEY);

$inv = $vyfakturuj_api->getSettings_paymentMethods();

echo '<h2>Načetli jsme tyto data:</h2>';
echo '<pre>'.print_r($inv,true).'</pre>';


exit;
