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
 * Podklady pro vytvoření šablony nebo pravidelné faktury
 *
 * Některá čísla v příkladu jsou číselná označení systémových typů.
 * Například: 'type' => 1 znamená, že vytvořený objekt bude Šablona a nikoliv Pravidelná faktura.
 *
 * Popis všech dostupných parametrů najdete v dokumentaci:
 * @link https://vyfakturujcz.docs.apiary.io/#reference/sablony,-pravidelne-faktury
 *
 * Zkušenější uživatelé mohou použít výčet možných hodnot v přiložené třídě VyfakturujEnum, například:.
 * 'type' => VyfakturujEnum::TEMPLATE_TYPE_TEMPLATE
 */
$params = [
    'id_customer' => 123,
    'type' => 2,
    'name' => '#API - Test pravidelné faktury',
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
        ]
    ]
];

$template = $vyfakturuj_api->createTemplate($params);
?>

<h2>Vytvoření šablony nebo pravidelné faktury</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($template, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
