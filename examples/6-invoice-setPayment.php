<?php

include(__DIR__.'/config.php');

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN,VYFAKTURUJ_API_KEY);




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


$res = $vyfakturuj_api->invoice_setPayment($_ID_DOKUMENTU,$_DATUM_UHRADY);    // Získáme šablonu, co by se odeslalo

echo '<h2>Doklad po uhrazení:</h2>';
echo '<pre>'.print_r($res,true).'</pre>';

exit;
