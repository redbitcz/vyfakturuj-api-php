<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$opt = array(
    'IC' => '123456789',
    'name' => '#API - Ukázkový kontakt',
    'note' => 'Kontakt vytvořený přes API',
    'company' => 'Ukázkový kontakt',
    'street' => 'Pouliční 79/C',
    'city' => 'Praha',
    'zip' => '10300',
    'country' => 'Česká republika',
    'mail_to' => 'info@examle.com',
);

$ret = $vyfakturuj_api->createContact($opt);

echo '<h1>Vytvořili jsme kontakt:</h1>';
echo '<pre><code class="json">' . json_encode($ret, JSON_PRETTY_PRINT) . '</code></pre>';
