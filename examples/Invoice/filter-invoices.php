<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

/**
 * Ukázka filtrování.
 * Načteme doklady, které jsou po splatnosti
 *
 * Seznam možných parametrů se nachází v sekci: "GET parametry při vyhledávání dokladu"
 * @link https://vyfakturujcz.docs.apiary.io/#reference/faktury
 */

$filter = sprintf('date_due~LT~%s|AND|flags~CTBIT~2~EQ~0', date('Y-m-d'));
$result = $vyfakturuj_api->getInvoices(['filter' => $filter]);

echo '<pre><code class="json">' . json_encode($result, JSON_PRETTY_PRINT) . '</code></pre>';
