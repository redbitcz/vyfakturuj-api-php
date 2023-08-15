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
 * Podklady pro vytvoření kontaktu
 *
 * Seznam všech dostupných parametrů je popsán v dokumentaci:
 * @link https://vyfakturujcz.docs.apiary.io/#reference/adresar
 */
$data = [
    'IC' => '123456789',
    'name' => '#API - Ukázkový kontakt',
    'note' => 'Kontakt vytvořený přes API',
    'company' => 'Ukázkový kontakt',
    'street' => 'Pouliční 79/C',
    'city' => 'Praha',
    'zip' => '10300',
    'country_code' => 'CZ',
    'mail_to' => 'info@examle.com',
];

$contact = $vyfakturuj_api->createContact($data);
?>

<h2>Vytvoření kontaktu</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($contact, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
