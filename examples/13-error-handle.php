<?php

use Redbit\Vyfakturuj\Api\VyfakturujApi;
use Redbit\Vyfakturuj\Api\VyfakturujApiException;

require_once __DIR__ . '/00-config.php';



// Pomocná třída pro ukázku, která je záměrně poškozená, aby selhala
class VyfakturujBrokenApi extends VyfakturujApi
{
    protected $endpointUrl = 'https://invalid.domain.vyfakturuj.cz/2.0/';
}



/*
 * Níže je ukázka, která je stejná jako v souboru 01-test.php, nicméně je záměrně poškozena, aby skončila chybou.
 * V příkladu je simulována situace, kdy se nepodaří připojení na API, například z důvodu vypadku internetu.
 * Při takové chybě dojde k tomu, že kód v daném místě „umře“ a nepokračuje dál, což by mohlo rozbít vaši aplikaci.
 * Tím, že kód zabalíte do try {...} catch, umožníte chybu tzv. zachytit, ošetřit a pokračovat v aplikaci dál.
 */


try {
    // Ukázka stejná, jako v příkladu 01-test.php
    echo "<h2>Ošetření chyb</h2>\n";

    $vyfakturuj_api = new VyfakturujBrokenApi(VYFAKTURUJ_API_LOGIN, VYFAKTURUJ_API_KEY);
    $result = $vyfakturuj_api->test();

    echo '<pre><code class="json">' . json_encode($result, JSON_PRETTY_PRINT) . '</code></pre>';
} catch (VyfakturujApiException $e) {
    // Toto se spustí, pokud kdekoliv v try {...} dojde k chybě (tzv. výjimce)
    // Vypíšeme uživateli omluvu, že se nepodařilo jeho požadavek dokončit
    // Uživatele nezatěžujeme technickými detaily, ty nechme technikovi
    echo "<div class=\"alert alert-danger\">Je nám líto, ale při zpracování došlo k chybě. Zkuste to prosím později, nebo nás kontaktujte.</div>\n";

    // Technikovi zapíšeme chybu do logů, aby věděl, co se děje
    trigger_error($e, E_USER_WARNING);
}

// Aplikace pokračuje dál
echo '<p>Pokračování aplikace…</p>';
