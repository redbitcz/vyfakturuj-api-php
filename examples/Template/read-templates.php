<?php
/**
 * @package Redbitcz\Vyfakturuj\VyfakturujAPI
 * @license MIT
 * @copyright 2016-2021 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 */

require_once __DIR__ . '/../config.php';

$vyfakturuj_api = new VyfakturujAPI(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);

$templates = $vyfakturuj_api->getTemplates();
?>

<h2>Načtení šablon a pravidelných faktur</h2>

<pre><code class="json">
<?= htmlspecialchars(json_encode($templates, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>
</code></pre>
