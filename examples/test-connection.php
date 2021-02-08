<?php

require_once __DIR__ . '/config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$result = $vyfakturuj_api->test();

echo '<h2>Test připojení k serveru</h2>';
echo '<pre><code class="json">' . json_encode($result, JSON_PRETTY_PRINT) . '</code></pre>';
