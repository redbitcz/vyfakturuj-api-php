<?php

require_once __DIR__ . '/00-config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

/*
 * Některá čísla v příkladu níže jsou číselná označení systémových typů.
 * Například: 'flags' => 64 znamená, že hledáme doklady se přeplatkem vzniklým při uhrazení.
 * Popis všech hodnot najdete v dokumentaci: https://vyfakturujcz.docs.apiary.io/#reference/faktury
 * Zkušenější uživatelé mohou použít výčet možných hodnot v přiložené třídě VyfakturujEnum.
 */
$opt = array(
//    'date_created_from' => '2016-10-01',
//    'date_created_to' => '2016-10-31',
    'flags' => 64,
);


$inv = $vyfakturuj_api->getInvoices($opt);

echo '<h2>Načetli jsme tyto doklady:</h2>';
echo '<pre>' . print_r($inv, true) . '</pre>';


exit;
