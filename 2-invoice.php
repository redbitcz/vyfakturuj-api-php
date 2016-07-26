<?php

include(__DIR__.'/inc/inc.php');
$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN,VYFAKTURUJ_API_KEY);

#
#
####################################################################################
####################################################################################
#####                                                                          #####
#####                             Vytvoření faktury                            #####
#####                                                                          #####
####################################################################################
####################################################################################
#
#

$opt = array(
    'customer_IC' => '123456789',
    'customer_DIC' => 'CZ123456789',
    'customer_name' => 'Ukázková Firma',
    'customer_street' => 'Pouliční 79/C',
    'customer_city' => 'Praha',
    'customer_zip' => '10300',
    'customer_country' => 'Česká republika',
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

$inv = $vyfakturuj_api->createInvoice($opt);    // vytvoříme novou fakturu

echo '<h2>Vytvořili jsme fakturu:</h2>';
echo '<pre>'.print_r($inv,true).'</pre>';

$_ID_DOKUMENTU = $inv['id'];    // uložíme si ID nového dokumentu
#
#
####################################################################################
####################################################################################
#####                                                                          #####
##### Úprava již vytvoření faktury (budeme upravovat právě vytvořenou fakturu) #####
#####                                                                          #####
####################################################################################
####################################################################################
#
#

$opt = array(
    'customer_name' => 'Ukázková Firma po úpravě',// Změníme název
    'items' => array(// odstraníme druhou položku a necháme jen jednu
        array(
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 15,
        ),
    )
);

$inv2 = $vyfakturuj_api->updateInvoice($_ID_DOKUMENTU,$opt);    // upravíme fakturu

echo '<h2>Upravili jsme fakturu:</h2>';
echo '<pre>'.print_r($inv2,true).'</pre>';


#
#
####################################################################################
####################################################################################
#####                                                                          #####
#####                 Získání informací o již vytvoření faktuře                #####
#####                                                                          #####
####################################################################################
####################################################################################
#
#


$inv3 = $vyfakturuj_api->getInvoice($_ID_DOKUMENTU);

echo '<h2>Načetli jsme data o faktuře ze systému:</h2>';
echo '<pre>'.print_r($inv3,true).'</pre>';


#
#
####################################################################################
####################################################################################
#####                                                                          #####
#####                              Smazání faktury                             #####
#####                                                                          #####
####################################################################################
####################################################################################
#
#

exit;   // zablokování smazání

$inv4 = $vyfakturuj_api->deleteInvoice($_ID_DOKUMENTU);

echo '<h2>Načetli jsme data o průběhu smazání faktury ze systému:</h2>';
echo '<pre>'.print_r($inv4,true).'</pre>';
exit;
