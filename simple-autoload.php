<?php
/**
 * @package Redbit\Vyfakturuj\Api
 * @license MIT
 * @copyright 2016-2018 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 * @author Ing. Martin Dostál
 */

/**
 * Script pro ruční instalaci
 * @see https://github.com/redbitcz/vyfakturuj-api-php/blob/master/manual-installation.md (Nápověda)
 */
spl_autoload_register(function ($class) {
    echo $class;
    $file = __DIR__ . '/src/' . str_replace('Redbit\\Vyfakturuj\\Api\\', '', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});