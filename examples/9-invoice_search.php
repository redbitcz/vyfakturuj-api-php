<?php

include(__DIR__.'/config.php');

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN,VYFAKTURUJ_API_KEY);

$opt = array(
//    'date_created_from' => '2016-10-01',
//    'date_created_to' => '2016-10-31',
    'flags' => 64,
);


$inv = $vyfakturuj_api->getInvoices($opt);

echo '<h2>Načetli jsme tyto doklady:</h2>';
echo '<pre>'.print_r($inv,true).'</pre>';


exit;
