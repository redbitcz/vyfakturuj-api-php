<?php

use Redbit\Vyfakturuj\Api\VyfakturujApi;

require_once __DIR__ . '/00-config.php';

echo "<h2>Vyhledání faktur</h2>\n";

$vyfakturuj_api = new VyfakturujApi(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

/*
 * Některá čísla v příkladu níže jsou číselná označení systémových typů.
 * Například: 'flags' => 64 znamená, že hledáme doklady se přeplatkem vzniklým při uhrazení.
 * Popis všech hodnot najdete v dokumentaci: https://vyfakturujcz.docs.apiary.io/#reference/faktury
 * Zkušenější uživatelé mohou použít výčet možných hodnot v přiložené třídě Redbit\Vyfakturuj\Api\VyfakturujEnum.
 */
$opt = array(
//    'date_created_from' => '2016-10-01',
//    'date_created_to' => '2016-10-31',
    'flags' => 64,
);


$inv = $vyfakturuj_api->getInvoices($opt);

echo '<h5>Načetli jsme tyto doklady:</h5>';
echo '<pre><code class="json">' . json_encode($inv, JSON_PRETTY_PRINT) . '</code></pre>';
