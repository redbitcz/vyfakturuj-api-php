<?php

require_once __DIR__ . '/00-config.php';

echo "<h2>Odeslání EET</h2>\n";

$vyfakturuj_api = new VyfakturujApi(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);


#
#
####################################################################################
####################################################################################
#####                                                                          #####
#####                           Odeslání dokumentu do EET                      #####
#####                                                                          #####
####################################################################################
####################################################################################
#
#

$_ID_DOKUMENTU = $_GET['id'];

$res = $vyfakturuj_api->invoice_sendEet($_ID_DOKUMENTU);    // Odešleme e-mail

echo '<h5>Tento dokument byl odeslán do EET:</h5>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';
