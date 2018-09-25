<?php

use Redbit\Vyfakturuj\Api\VyfakturujApi;

require_once __DIR__ . '/00-config.php';

echo "<h2>Provedení uhrazení dokladu</h2>\n";

$vyfakturuj_api = new VyfakturujApi(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);


#
#
####################################################################################
####################################################################################
#####                                                                          #####
#####                             Uhrazení dokladu                             #####
#####                                                                          #####
####################################################################################
####################################################################################
#
#

$_ID_DOKUMENTU = 54525; // zde zadejte ID dokladu, který chcete uhradit
$_DATUM_UHRADY = '2016-07-25';


$res = $vyfakturuj_api->invoice_setPayment($_ID_DOKUMENTU, $_DATUM_UHRADY);  // Provedeme uhrazení

echo '<h5>Doklad po uhrazení:</h5>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';
