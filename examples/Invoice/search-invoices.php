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
 * Zadejte informace o faktuře pro vyhledání
 *
 * Seznam dostupných parametrů je popsán v dokumentaci v sekci: „GET parametry při vyhledávání dokladu“
 * @link https://vyfakturujcz.docs.apiary.io/#reference/faktury
 */
$params = [
    'id_customer' => 123,
    'type' => 1
];

$invoices = $vyfakturuj_api->getInvoices($params);
?>

<h2>Vyhledání faktur</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($invoices, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
