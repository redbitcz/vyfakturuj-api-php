<?php

require_once __DIR__ . '/00-config.php';

echo "<h2>Vytvoření a úpravy kontaktu</h2>\n";

$vyfakturuj_api = new VyfakturujApi(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

#
#
#####################################################################################
#####################################################################################
#####                                                                           #####
#####                                 Vytvoření                                 #####
#####                                                                           #####
#####################################################################################
#####################################################################################
#
#

$opt = array(
    'IC' => '123456789',
    'name' => '#API - Ukázkový kontakt',
    // "#API - " dáváme na začátek, chceme mít tento kontakt na začátku našeho adresáře
    'note' => 'Kontakt vytvořený přes API',
    'company' => 'Ukázkový kontakt',
    'street' => 'Pouliční 79/C',
    'city' => 'Praha',
    'zip' => '10300',
    'country' => 'Česká republika',
    'mail_to' => 'info@examle.com',
);

$contact = $vyfakturuj_api->createContact($opt);    // vytvoříme novou fakturu

echo '<h5>Vytvořili jsme kontakt:</h5>';
echo '<pre><code class="json">' . json_encode($contact, JSON_PRETTY_PRINT) . '</code></pre>';

$_ID_KONTAKTU = $contact['id'];    // uložíme si ID nového kontaktu
#
#
#####################################################################################
#####################################################################################
#####                                                                           #####
#####                                  Úprava                                   #####
#####                                                                           #####
#####################################################################################
#####################################################################################
#
#

$opt = array(
    'name' => '#API - Ukázkový kontakt - po úpravě',//
);

$contact2 = $vyfakturuj_api->updateContact($_ID_KONTAKTU, $opt);    // upravíme kontakt

echo '<h5>Upravili jsme fakturu:</h5>';
echo '<pre><code class="json">' . json_encode($contact2, JSON_PRETTY_PRINT) . '</code></pre>';


#
#
#####################################################################################
#####################################################################################
#####                                                                           #####
#####                                   Čtení                                   #####
#####                                                                           #####
#####################################################################################
#####################################################################################
#
#


$contact3 = $vyfakturuj_api->getContact($_ID_KONTAKTU); // načte 1 konkrétní kontakt
// $contact3 = $vyfakturuj_api->getContacts();  // vrátí všechny moje kontakty

echo '<h5>Načetli jsme data o kontaktu ze systému:</h5>';
echo '<pre><code class="json">' . json_encode($contact3, JSON_PRETTY_PRINT) . '</code></pre>';


#
#
#####################################################################################
#####################################################################################
#####                                                                           #####
#####                                  Smazání                                  #####
#####                                                                           #####
#####################################################################################
#####################################################################################
#
#

exit;   // zablokování smazání

$contact4 = $vyfakturuj_api->deleteContact($_ID_KONTAKTU);

echo '<h5>Načetli jsme data o průběhu smazání kontaktu ze systému:</h5>';
echo '<pre><code class="json">' . json_encode($contact4, JSON_PRETTY_PRINT) . '</code></pre>';
