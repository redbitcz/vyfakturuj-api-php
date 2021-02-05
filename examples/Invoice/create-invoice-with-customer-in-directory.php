<?php
/**
 * @package Redbitcz\Vyfakturuj\VyfakturujAPI
 * @license MIT
 * @copyright 2016-2021 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 */

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

/**
 * Informace o odběrateli (kontaktu), který bude použit ve faktuře
 *
 * Seznam dostupných parametrů je popsán v dokumentaci:
 * @link https://vyfakturujcz.docs.apiary.io/#reference/adresar
 */
$contactParams = [
    'IC' => '123456789',
    'name' => '#API - Ukázkový kontakt',
    'note' => 'Kontakt vytvořený přes API',
    'company' => 'Ukázkový kontakt',
    'street' => 'Pouliční 79/C',
    'city' => 'Praha',
    'zip' => '10300',
    'delivery_country_code' => 'CZ',
    'mail_to' => 'info@examle.com',
];

/** Z odběratele si vytáhneme IČ, které použijeme pro jeho dohledání v kontaktech */
$contactSearch = [
    'IC' => $contactParams['IC'],
];

$contacts = $vyfakturuj_api->getContacts($contactSearch);

if (count($contacts) > 0) {
    // Kontakt BYL v systému byl nalezen, získáme jeho ID
    $contactId = $contacts[0]['id'];
} else {
    // Kontakt NEBYL v systému byl nalezen, tak jej vytvoříme a po vytvoření získáme jeho ID
    $contacts = $vyfakturuj_api->createContact($contactParams);
    $contactId = $contacts['id'];
}

/**
 * Podklady pro vytvoření faktury
 *
 * Některá čísla v příkladu jsou číselná označení systémových typů.
 * Například: 'type' => 1 znamená, že vytvořený doklad bude Faktura a nikoliv třeba Výzva k platbě.
 * Popis všech hodnot najdete v dokumentaci:
 * @link https://vyfakturujcz.docs.apiary.io/#reference/faktury
 * Zkušenější uživatelé mohou použít výčet možných hodnot v přiložené třídě VyfakturujEnum, například:.
 * 'type' => VyfakturujEnum::DOCUMENT_TYPE_FAKTURA
 */
$invoiceParams = [
    'type' => 1,
    'id_customer' => $contactId, // <-- Přidáme vazbu na kontakt z adresáře jako odběratele pro vytvořenou fakturu
    'calculate_vat' => 2,
    'payment_method' => 2,
    'customer_IC' => $contactParams['IC'],
    'customer_name' => $contactParams['name'],
    'customer_street' => $contactParams['street'],
    'customer_city' => $contactParams['city'],
    'customer_zip' => $contactParams['zip'],
    'customer_country_code' => $contactParams['delivery_country_code'],
    'currency' => 'EUR',
    'items' => [
        [
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 15,
        ],
        [
            'text' => 'Kapalina do ostřikovačů 250 ml',
            'unit_price' => 59,
            'vat_rate' => 15,
        ],
        [
            'text' => 'Doprava',
            'unit_price' => 0,
            'vat_rate' => 0,
        ]
    ],
    'action_after_create_send_to_eet' => true
];

$invoice = $vyfakturuj_api->createInvoice($invoiceParams);
?>

<h2>Vytvoření faktury s napojením na kontakt</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($invoice, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>

