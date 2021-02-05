<?php
/**
 * @package Redbitcz\Vyfakturuj\VyfakturujAPI
 * @license MIT
 * @copyright 2016-2021 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 *
 * Interní nastavení nezbytné pro běh Vyfakturuj API příkladů
 */

require_once __DIR__ . '/../simple-autoload.php';
require_once __DIR__ . '/assets/example-loader.php';

/**
 * Nastavení Vyfakturuj API - níže prosím vyplňte vaše přihlašovací údaje, které najdete na stránce:
 * https://app.vyfakturuj.cz/nastaveni/api/
 */

/** Zadejte přilhašovací jméno (email) */
define('VYFAKTURUJ_API_LOGIN', 'demo@simpleshop.cz');

/** Zadejte API klíč */
define('VYFAKTURUJ_API_KEY', 'NkJP6q35yw27WVxWdjQHlOzNBlYznRa8gdo9Om1B');
