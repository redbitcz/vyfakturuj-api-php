<?php
/**
 * @package Redbitcz\Vyfakturuj\VyfakturujAPI
 * @license MIT
 * @copyright 2016-2021 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 */

/**
 * Script pro ruční instalaci
 * @link https://github.com/redbitcz/vyfakturuj-api-php/blob/master/manual-installation.md (Nápověda)
 */
spl_autoload_register(
    static function ($class) {
        $file = __DIR__ . '/libs/' . $class . '.php';
        if (file_exists($file)) {
            /** @noinspection PhpIncludeInspection */
            require $file;
        }
    }
);
