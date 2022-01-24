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
 * Podklady pro vytvoření zálohové faktury
 *
 * 'type' => 2 znamená, že vytvořený doklad bude typu Zálohová Faktura.
 *
 * Popis všech dostupných parametrů najdete v dokumentaci:
 * @link https://vyfakturujcz.docs.apiary.io/#reference/faktury
 */
$depositInvoiceParameters = [
    'type' => 2,
    'calculate_vat' => 2,
    'payment_method' => 2,
    'customer_IC' => '123456789',
    'customer_DIC' => 'CZ123456789',
    'customer_name' => 'Ukázková Firma',
    'customer_street' => 'Pouliční 79/C',
    'customer_city' => 'Praha',
    'customer_zip' => '10300',
    'customer_country_code' => 'CZ',
    'currency' => 'CZK',
    'items' => [
        [
            'quantity' => 1,
            'text' => 'Stěrač na ponorku',
            'unit_price' => 1000,
        ],
    ],
];

$depositInvoiceParameters_2 = [
    'type' => 2,
    'calculate_vat' => 2,
    'payment_method' => 2,
    'customer_IC' => '123456789',
    'customer_DIC' => 'CZ123456789',
    'customer_name' => 'Ukázková Firma',
    'customer_street' => 'Pouliční 79/C',
    'customer_city' => 'Praha',
    'customer_zip' => '10300',
    'customer_country_code' => 'CZ',
    'currency' => 'CZK',
    'items' => [
        [
            'quantity' => 1,
            'text' => 'Stěrač na ponorku #2',
            'unit_price' => 2000,
        ],
    ],
];

$depositInvoice = $vyfakturuj_api->createInvoice($depositInvoiceParameters);
$depositInvoice_2 = $vyfakturuj_api->createInvoice($depositInvoiceParameters_2);

/**
 * Podklady pro vytvoření koncové faktury k zálohové
 *
 * Parametr `type` má být 1 - typ Faktura.
 * Do parametru `id_parent` je nutně zadat ID zálohové faktury.
 * Položky je třeba vyplnit ručně.
 */
$endInvoiceParameters = [
    'id_parent' => $depositInvoice['id'],
    'type' => 1,
    'calculate_vat' => 2,
    'payment_method' => 2,
    'customer_IC' => '123456789',
    'customer_DIC' => 'CZ123456789',
    'customer_name' => 'Ukázková Firma',
    'customer_street' => 'Pouliční 79/C',
    'customer_city' => 'Praha',
    'customer_zip' => '10300',
    'customer_country_code' => 'CZ',
    'currency' => 'CZK',
    'items' => [
        [
            'quantity' => 1,
            'text' => 'Fakturujeme Vám ...',
            'unit_price' => 3000,
        ],
        [
            'quantity' => 1,
            'text' => 'Stěrač na ponorku (' . $depositInvoice['number'] . ')',
            'unit_price' => -1000,
        ],
        [
            'quantity' => 1,
            'text' => 'Stěrač na ponorku #2 (' . $depositInvoice_2['number'] . ')',
            'unit_price' => -2000,
        ],
    ],
];

/**
 * Do hodiny nově vytvořená faktura bude přířazená zálohové jako koncový doklad.
 */
$endInvoice = $vyfakturuj_api->createInvoice($endInvoiceParameters);
?>

<h2>Vytvoření koncové faktury k zálohové</h2>

<h3>Zálohová faktura, ke které bude pak vytvořená koncová</h3>

<pre><code class="json">
<?= htmlspecialchars(json_encode($depositInvoice, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>

<h3>Koncová faktura, k zálohové</h3>

<pre><code class="json">
<?= htmlspecialchars(json_encode($endInvoice, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
