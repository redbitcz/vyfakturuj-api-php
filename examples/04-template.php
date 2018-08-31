<?php

include __DIR__ . '/00-config.php';

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
// Vytvoříme nový kontakt
$opt_contact = array(
    'IC' => '123456789',
    'name' => '#API - Ukázkový kontakt pro pravidelnou fakturu',
    // "#API - " dáváme na začátek, chceme mít tento kontakt na začátku našeho adresáře
    'note' => 'Kontakt vytvořený přes API',
    'company' => 'Ukázkový kontakt',
    'street' => 'Pouliční 79/C',
    'city' => 'Praha',
    'zip' => '10300',
    'country' => 'Česká republika',
    'mail_to' => 'info@examle.com',
);
$contact = $vyfakturuj_api->createContact($opt_contact);    // vytvoříme nový kontakt

$_ID_CONTACT = $contact['id'];

$opt_template = array(
    'id_customer' => $_ID_CONTACT,// vložíme právě vytvořený kontakt
//    'id_customer' => 20224,// vložíme právě vytvořený kontakt
    'type' => 2,// chceme pravidelnou fakturu
    'name' => '#API - Test pravidelné faktury',
//    'id_customer' => $contact['id'],// vložíme právě vytvořený kontakt
    'items' => array(
        array(
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 15,
        ),
        array(
            'text' => 'Kapalina do ostřikovačů 250 ml',
            'unit_price' => 59,
            'vat_rate' => 15,
        )
    )
);


$ret = $vyfakturuj_api->createTemplate($opt_template);    // vytvoříme novou fakturu

echo '<h2>Vytvořili jsme pravidelnou fakturu:</h2>';
echo '<pre>' . print_r($ret, true) . '</pre>';

$_ID_ITEM = $ret['id'];    // uložíme si ID nového zaznamu
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

$opt_template = array(
    'name' => '#API + Test pravidelné faktury',// změníme název
    'items' => array(
        array(
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 21,// změníme DPH
        ),
        array(
            'text' => 'Kapalina do ostřikovačů 250 ml',
            'unit_price' => 59,
            'vat_rate' => 21,// změníme DPH
        )
    )
);

$ret2 = $vyfakturuj_api->updateTemplate($_ID_ITEM, $opt_template);    // upravíme zaznam

echo '<h2>Upravili jsme pravidelnou fakturu:</h2>';
echo '<pre>' . print_r($ret2, true) . '</pre>';


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


$ret3 = $vyfakturuj_api->getTemplate($_ID_ITEM);
// $ret3 = $vyfakturuj_api->getTemplates(); // vrati vsechny sablony a pravidelné faktury
// $ret3 = $vyfakturuj_api->getTemplates(array('type' => 2,'end_type' => 1)); // vrati vsechny pravidelné faktury, které nemají nastaveno datum ukončení

echo '<h2>Načetli jsme data o pravidelné faktuře faktuře ze systému:</h2>';
echo '<pre>' . print_r($ret3, true) . '</pre>';


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

$ret4 = $vyfakturuj_api->deleteTemplate($_ID_ITEM);
$ret5 = $vyfakturuj_api->deleteContact($_ID_CONTACT);

echo '<h2>Načetli jsme data o průběhu smazání faktury ze systému:</h2>';
echo '<pre>' . print_r($ret4, true) . '</pre>';
echo '<pre>' . print_r($ret5, true) . '</pre>';
exit;
