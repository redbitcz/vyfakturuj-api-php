<?php

include(__DIR__ . '/00-config.php');

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN,VYFAKTURUJ_API_KEY);


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

echo '<h2>Tento dokument byl odeslán do EET:</h2>';
echo '<pre>'.print_r($res,true).'</pre>';

exit;
