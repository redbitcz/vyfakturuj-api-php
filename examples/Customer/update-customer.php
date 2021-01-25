<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$id = 12345; // ID zákazníka

$opt = array(
    'name' => '#API - Ukázkový kontakt - po úpravě',
);

$contact2 = $vyfakturuj_api->updateContact($id, $opt);    // upravíme kontakt

echo '<h1>Upravili jsme kontakt</h1>';
echo '<pre><code class="json">' . json_encode($contact2, JSON_PRETTY_PRINT) . '</code></pre>';
