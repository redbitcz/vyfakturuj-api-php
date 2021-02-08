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
 * Zadejte ID faktury pro její uhrazení a datum úhrady
 */
$invoiceId = 12345;
$paymentDate = '2021-01-30';

$result = $vyfakturuj_api->invoice_setPayment($invoiceId, $paymentDate);
?>

<h2>Uhrazení dokladu</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
