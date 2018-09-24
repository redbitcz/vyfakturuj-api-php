<?php

require_once __DIR__ . '/00-config.php';

echo "<h2>Test připojení k serveru</h2>\n";

$vyfakturuj_api = new VyfakturujApi(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);
$result = $vyfakturuj_api->test();

echo '<pre><code class="json">' . json_encode($result, JSON_PRETTY_PRINT) . '</code></pre>';
