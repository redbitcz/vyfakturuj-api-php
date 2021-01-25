<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID dokumentu

$opt = array(// šablona, kterou si přejeme odeslat
    'type' => 3,
    'to' => 'demo@vyfakturuj.cz',// lze také použit tento zápis: 'demo1@vyfakturuj.cz, demo2@vyfakturuj.cz'
//    'cc' => '',
//    'bcc' => '',
//    'subject' => 'Testovací subjekt',
//    'body' => '.. zde by byl text e-mailu, ktery chceme odeslat ...',
    'pdfAttachment' => true,// chceme poslat včetně PDF v příloze
);

/**
 * Provedeme simulaci odeslání mailu.
 * Systém nám vrátí, co by se odeslalo.
 * Ke skutečnému odeslání v tomto případě nedojde.
 */
$res = $vyfakturuj_api->invoice_sendMail_test($id, $opt);

echo '<h1>Tento mail by se odeslal:</h1>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';


/**
 * Provedeme odeslání mailu.
 */
$res = $vyfakturuj_api->invoice_sendMail($id, $opt);    // Odešleme e-mail

echo '<h1>Tento e-mail byl odeslán:</h1>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';
