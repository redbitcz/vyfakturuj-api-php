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
 * Zadejte ID šablony nebo pravidelné faktury pro úpravu
 */
$templateId = 12345; // ID pravidelné faktury

/**
 * Podklady pro úpravu  šablony nebo pravidelné faktury
 *
 * V příkladu měníme název šablony a seznam položek na faktuře nahrazujeme novým seznamem
 *
 * Popis všech dostupných parametrů najdete v dokumentaci:
 * @link https://vyfakturujcz.docs.apiary.io/#reference/sablony,-pravidelne-faktury
 */
$params = [
    'name' => '#API + Test pravidelné faktury',
    'items' => [
        [
            'text' => 'Stěrač na ponorku',
            'unit_price' => 990.25,
            'vat_rate' => 21,
        ],
        [
            'text' => 'Kapalina do ostřikovačů 250 ml',
            'unit_price' => 59,
            'vat_rate' => 21,
        ]
    ]
];

$template = $vyfakturuj_api->updateTemplate($templateId, $params);
?>

<h2>Editace šablony nebo pravidelné faktury</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($template, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
