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
 * Zadejte ID faktury pro odeslání do EET
 */
$invoiceId = 12345;

/**
 * Zadejte informace o příjemcích e-mailu.
 *
 * Více příjemců je možno vložit oddělené čárkou, např.:
 * 'to' => 'demo@vyfakturuj.cz, demo2@vyfakturuj.cz, demo3@vyfakturuj.cz'
 *
 * Pokud nepošlete předmět e-mailu nebo jeho obsah, systém vygeneruje text podle nastavení firmy:
 * @link https://app.vyfakturuj.cz/nastaveni/faktury/maily/
 *
 * Seznam dostupných parametrů je popsán v dokumentaci
 * @link https://vyfakturujcz.docs.apiary.io/#reference/faktury/odeslani-faktury-e-mailem
 */
$emailParams = [
    'type' => 3,
    'to' => 'demo@vyfakturuj.cz',
//    'cc' => '',
//    'bcc' => '',
//    'subject' => 'Vlastní předmět e-mailu',
//    'body' => 'Vlastní text e-mailu, který si přejete odeslat',
    'pdfAttachment' => true,
];

/**
 * Část 1. – náhled e-mailu (bez jeho odeslání)
 */
$result = $vyfakturuj_api->invoice_sendMail_test($invoiceId, $emailParams);
?>

<h2>Náhled odesílaného e-mailu</h2>
<p>Funkcí <code>invoice_sendMail_test()</code> nedojde k odeslání e-mailu, systém vygeneruje podobu e-mailu,
    který by se odeslal</code></p>

<pre><code class="json">
<?= htmlspecialchars(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
<?php


/**
 * Část 2. – odeslání e-mailu
 */
$result = $vyfakturuj_api->invoice_sendMail($invoiceId, $emailParams);

?>
<h2>Odeslání e-mailu</h2>
<p>Funkcí <code>invoice_sendMail()</code> dojde k odeslání e-mailu</code></p>

<pre><code class="json">
<?= htmlspecialchars(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
