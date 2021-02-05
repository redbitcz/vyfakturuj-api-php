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
 * Příklad filtrovacího řetězce, který vyhledá neugrazené faktury po splatnosti
 *
 * Seznam použitelných filtrů a jejich použití najdete v dokumentaci v sekci: „Filtrování“
 * @link https://vyfakturujcz.docs.apiary.io/#reference/faktury
 */
$filter = sprintf('date_due~LT~%s|AND|flags~CTBIT~2~EQ~0', date('Y-m-d'));

$invoices = $vyfakturuj_api->getInvoices(['filter' => $filter]);
?>

<h2>Filtrování faktur</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($invoices, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
