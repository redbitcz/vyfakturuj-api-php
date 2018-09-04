<?php

require_once __DIR__ . '/00-config.php';

echo "<h2>Odeslání e-mailu</h2>\n";

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

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

/*
 * Některá čísla v příkladu níže jsou číselná označení systémových typů.
 * Například: 'type' => 3 znamená, že posíláme Potvrzení o úhradě, nikoliv třeba Upomínku.
 * Popis všech hodnot najdete v dokumentaci: https://vyfakturujcz.docs.apiary.io/#reference/faktury
 * Zkušenější uživatelé mohou použít výčet možných hodnot v přiložené třídě VyfakturujEnum.
 */
$opt = array(// šablona, kterou si přejeme odeslat
    'type' => 3,
    'to' => 'demo@vyfakturuj.cz',// lze také použit tento zápis: 'demo1@vyfakturuj.cz, demo2@vyfakturuj.cz'
//    'cc' => '',
//    'bcc' => '',
//    'subject' => 'Testovací subjekt',
//    'body' => '.. zde by byl text e-mailu, ktery chceme odeslat ...',
    'pdfAttachment' => true,// chceme poslat včetně PDF v příloze
);

$res = $vyfakturuj_api->invoice_sendMail_test($_ID_DOKUMENTU, $opt);    // Získáme šablonu, co by se odeslalo

echo '<h5>Tento mail by se odeslal:</h5>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';


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
die('<span style="color:red">Odkomentujte řádek ' . __LINE__ . ' pokud chcete e-mail skutečně odeslat.</span>');    // tento řádek zakomentujte a mail se skutečně odešle.

$res = $vyfakturuj_api->invoice_sendMail($_ID_DOKUMENTU, $opt);    // Odešleme e-mail

echo '<h5>Tento e-mail byl odeslán:</h5>';
echo '<pre><code class="json">' . json_encode($res, JSON_PRETTY_PRINT) . '</code></pre>';
