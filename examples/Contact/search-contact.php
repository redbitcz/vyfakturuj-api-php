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
 * Zadejte informace o kontaktu pro vyhledání
 *
 * Seznam všech dostupných parametrů je popsán v dokumentaciv sekci „Adresář“
 * @link https://vyfakturujcz.docs.apiary.io/#reference/adresar
 */
$params = [
    'IC' => 12345678,
    'mail_to' => 'example@example.com'
];

$contacts = $vyfakturuj_api->getContacts($params);
?>

<h2>Vyhledání kontaktu</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
