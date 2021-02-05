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
 * Zadejte informace o šablonách nebo pravidelých fakturách pro vyhledání
 *
 * Seznam dostupných parametrů je popsán v dokumentaci:
 * @link https://vyfakturujcz.docs.apiary.io/#reference/sablony,-pravidelne-faktury
 */
$params = [
    'type' => 2,
    'end_type' => 1
];

$templates = $vyfakturuj_api->getTemplates($params);
?>

<h2>Vyhledání šablon a pravidelných faktur</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($templates, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
