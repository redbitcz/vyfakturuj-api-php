<?php
/**
 * @package Redbitcz\Vyfakturuj\VyfakturujAPI
 * @license MIT
 * @copyright 2016-2021 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 */

require_once __DIR__ . '/../config.php';

/**
 * Test faktury v PDF
 *
 * Pošle data na server, vytvoří na serveru fakturu, kterou ale neuloží, a pošle zpět ve formátu PDF.
 * Pokud se podaří fakturu vytvořit, pak je poslána ve formátu PDF na výstup. Jinak je vráceno pole.
 */

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

/**
 * Zadejte informace o faktuře pro její vytvoření
 *
 * Seznam dostupných parametrů je popsán v dokumentaci:
 * @link https://vyfakturujcz.docs.apiary.io/#reference/faktury
 */
$opt = [
    'customer_IC' => '123456789',
    'customer_DIC' => 'CZ123456789',
    'customer_name' => 'Ukázková Firma',
    'customer_street' => 'Pouliční 79/C',
    'customer_city' => 'Praha',
    'customer_zip' => '10300',
    'customer_country_code' => 'CZ',
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
    ]
];
$response = $vyfakturuj_api->test_invoice__asPdf($opt);
?>

<h2>Test faktury v PDF</h2>

<p>Fakturu v PDF se nepodařilo stáhnout, níže je uveden výstup ze serveru:</p>

<pre><code class="json">
<?= htmlspecialchars(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
