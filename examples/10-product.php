<?php

include(__DIR__ . '/00-config.php');

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN,VYFAKTURUJ_API_KEY);

$opt = array(
    'date_created_from' => '2016-10-01',
    'date_created_to' => '2016-10-31',
);


$ret = $vyfakturuj_api->getProducts($opt);

echo '<h2>Načetli jsme tyto produkty:</h2>';
echo '<pre>'.print_r($ret,true).'</pre>';


exit;
