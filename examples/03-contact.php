<?php

require_once __DIR__ . '/00-config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

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

echo '<h2>Vytvořili jsme kontakt:</h2>';
echo '<pre>' . print_r($contact, true) . '</pre>';

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

echo '<h2>Upravili jsme fakturu:</h2>';
echo '<pre>' . print_r($contact2, true) . '</pre>';


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

echo '<h2>Načetli jsme data o kontaktu ze systému:</h2>';
echo '<pre>' . print_r($contact3, true) . '</pre>';


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

echo '<h2>Načetli jsme data o průběhu smazání kontaktu ze systému:</h2>';
echo '<pre>' . print_r($contact4, true) . '</pre>';


exit;
