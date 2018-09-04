<?php

require_once __DIR__ . '/00-config.php';

echo "<h2>Načtení platebních metod</h2>\n";

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$inv = $vyfakturuj_api->getSettings_paymentMethods();

echo '<h5>Načetli jsme tyto data:</h5>';
echo '<pre><code class="json">' . json_encode($inv, JSON_PRETTY_PRINT) . '</code></pre>';
