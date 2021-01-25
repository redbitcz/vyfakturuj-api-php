<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

/**
 * Parametry se nacházejí v sekci "GET parametry při vyhledávání kontaktu"
 * @link https://vyfakturujcz.docs.apiary.io/#reference/adresar
 */
$opt = [
    'IC' => 12345678,
    'mail_to' => 'example@example.com'
];

$ret = $vyfakturuj_api->getContacts($opt);

echo '<h1>Seznam odpovídajích zákazníků</h1>';
echo '<pre><code class="json">' . json_encode($ret, JSON_PRETTY_PRINT) . '</code></pre>';
