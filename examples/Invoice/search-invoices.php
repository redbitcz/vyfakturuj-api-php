<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);


/**
 * Seznam možných parametrů se nachází v sekci: "GET parametry při vyhledávání dokladu"
 * @link https://vyfakturujcz.docs.apiary.io/#reference/faktury
 */
$opt = array(
    'id_customer' => 123,
    'type' => 1
);

$inv = $vyfakturuj_api->getInvoices($opt);

echo '<h1>Načetli jsme doklady:</h1>';
echo '<pre><code class="json">' . json_encode($inv, JSON_PRETTY_PRINT) . '</code></pre>';


/*
 * Ukázka filtrování.
 * Načteme doklady, které jsou po splatnosti
 */
$date = date('Y-m-d');
$filter = sprintf('date_due~LT~%s|AND|flags~CTBIT~2~EQ~0', $date);
$result = $vyfakturuj_api->getInvoices(['filter' => $filter]);

echo '<pre><code class="json">' . json_encode($result, JSON_PRETTY_PRINT) . '</code></pre>';
