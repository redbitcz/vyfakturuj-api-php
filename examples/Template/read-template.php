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
 * Zadejte ID šablony nebo pravidelné faktury pro zobrazení
 */
$templateId = 12345;

$template = $vyfakturuj_api->getTemplate($templateId);
?>

<h2>Načtení šablony nebo pravidelné faktury</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($template, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
