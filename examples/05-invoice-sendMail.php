<?php

include(__DIR__ . '/00-config.php');

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN,VYFAKTURUJ_API_KEY);

#
#
####################################################################################
####################################################################################
#####                                                                          #####
#####                     Získání mailu (pro kontrolu)                         #####
#####                                                                          #####
####################################################################################
####################################################################################
#
#

$_ID_DOKUMENTU = 51672;

$opt = array(// šablona, kterou si přejeme odeslat
    'type' => 3,
    'to' => 'demo@vyfakturuj.cz',// lze také použit tento zápis: 'demo1@vyfakturuj.cz, demo2@vyfakturuj.cz'
//    'cc' => '',
//    'bcc' => '',
//    'subject' => 'Testovací subjekt',
//    'body' => '.. zde by byl text e-mailu, ktery chceme odeslat ...',
    'pdfAttachment' => true,// chceme poslat včetně PDF v příloze
);

$res = $vyfakturuj_api->invoice_sendMail_test($_ID_DOKUMENTU,$opt);    // Získáme šablonu, co by se odeslalo

echo '<h2>Tento mail by se odeslal:</h2>';
echo '<pre>'.print_r($res,true).'</pre>';


#
#
####################################################################################
####################################################################################
#####                                                                          #####
#####                           Skutečné odeslání e-mailu                      #####
#####                                                                          #####
####################################################################################
####################################################################################
#
#
die('<font color="red">Odkomentujte řádek '.__LINE__.' pokud chcete e-mail skutečně odeslat.</font>');    // tento řádek zakomentujte a mail se skutečně odešle.

$res = $vyfakturuj_api->invoice_sendMail($_ID_DOKUMENTU,$opt);    // Odešleme e-mail

echo '<h2>Tento e-mail byl odeslán:</h2>';
echo '<pre>'.print_r($res,true).'</pre>';

exit;
