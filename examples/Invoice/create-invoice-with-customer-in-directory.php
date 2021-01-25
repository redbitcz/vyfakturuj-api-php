<?php

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);


$customer = array(
    'IC' => '123456789',
    'name' => '#API - Ukázkový kontakt',
    'note' => 'Kontakt vytvořený přes API',
    'company' => 'Ukázkový kontakt',
    'street' => 'Pouliční 79/C',
    'city' => 'Praha',
    'zip' => '10300',
    'delivery_country_code' => 'CZ',
    'mail_to' => 'info@examle.com',
);

$searchCustomer = [
    'IC' => $customer['IC'],
];

// Pokusíme se najít zákazníka v našem adresáři
$ret = $vyfakturuj_api->getContacts($searchCustomer);

if(count($ret) > 0){ // Zákazník nalezen
    $id_customer = $ret[0]['id'];
}else{ // Zákazník v adresáři nenalezen. Vytvořím ho.
    $ret = $vyfakturuj_api->createContact($customer);
    $id_customer = $ret['id'];
}


$invoice = array(
    'type' => 1,
    'id_customer' => $id_customer, // <-- Přidáme vazbu na adresář.
    'calculate_vat' => 2,
    'payment_method' => 2,
    'customer_IC' => $customer['IC'],
    'customer_name' => $customer['name'],
    'customer_street' => $customer['street'],
    'customer_city' => $customer['city'],
    'customer_zip' => $customer['zip'],
    'customer_country_code' => $customer['delivery_country_code'],
    'currency' => 'EUR',
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
        ),
        array(
            'text' => 'Doprava',
            'unit_price' => 0,
            'vat_rate' => 0,
        )
    ),
    'action_after_create_send_to_eet' => true
);

$inv = $vyfakturuj_api->createInvoice($invoice);    // vytvoříme novou fakturu

echo '<h1>Vytvořili jsme fakturu:</h1>';
echo '<pre><code class="json">' . json_encode($inv, JSON_PRETTY_PRINT) . '</code></pre>';
