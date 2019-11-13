<?php
/**
 * @package Redbit\Vyfakturuj\VyfakturujAPI
 * @license MIT
 * @copyright 2016-2018 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 * @author Ing. Martin Dostál
 */

// Search optional composer if is package used as literally project - needed for apply ca-bundle package
if (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
    require_once __DIR__ . '/../../vendor/autoload.php';
}

// PHP 5.3 compatibility
if (!defined('JSON_PRETTY_PRINT')) {
    define('JSON_PRETTY_PRINT', 128);
}


/**
 * Tento soubor není pro běh API důležitý, pouze pomáhá zlepšit přehlednost ukázek
 */
$web = PHP_SAPI !== 'cli';

if ($web):
    ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha256-eSi1q2PG6J7g7ib17yAaWMcrr5GrtohYChqibrV7PBE=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-light.min.css" integrity="sha256-aw9uGjVU5OJyMYN70Vu2kZ1DDVc1slcJCS2XvuPCPKo=" crossorigin="anonymous">
        <link rel="shortcut icon" href="https://www.vyfakturuj.cz/favicon.ico">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha256-VsEqElsCHSGmnmHXGQzvoWjWwoznFSZc6hs7ARLRacQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js" integrity="sha256-/BfiIkHlHoVihZdc6TFuj7MmJ0TWcWsMXkeDFwhi0zw=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/languages/json.min.js" integrity="sha256-KPdGtw3AdDen/v6+9ue/V3m+9C2lpNiuirroLsHrJZM=" crossorigin="anonymous"></script>
        <script>hljs.initHighlightingOnLoad();</script>
        <title>VyfakturujAPI - příklady</title>
    </head>
    <body>
        <div class="container">
            <h1 class="mt-5"><a href="https://www.vyfakturuj.cz/api/">VyfakturujAPI</a> příklad</h1>
            <div class="jumbotron mt-3">
    <?php
endif;


register_shutdown_function(function () use ($web) {
    if ($web) :
        ?>

            </div>
        </div>
    </body>
</html>
        <?php
    else:
        echo PHP_EOL;
    endif;
});


set_exception_handler(function ($e) use ($web) {
    /**
     * For compatibility PHP 5.3 - 7.2+ unable to type parameter directly
     * @var \Throwable $e
     */
    if ($web) :
        ?>

        <div class="alert alert-danger" role="alert">
            <strong><?= sprintf('Došlo k chybě #%d (%s):', $e->getCode(), get_class($e)); ?></strong>
            <code style="display:block;white-space: pre-wrap"><?= $e->getMessage(); ?></code>
            <small><?= sprintf('na řádku %d v souboru: <code>%s</code>', $e->getLine(), $e->getFile()); ?></small>
        </div>
    <?php
    else:
        $message = sprintf('%s na řádku %d v souboru: %s', $e->getMessage(), $e->getLine(), $e->getFile());
        trigger_error($message, E_USER_ERROR);
    endif;
});


set_error_handler(function ($errno, $errstr, $errfile, $errline) use ($web) {
    $style = 'danger';
    $name = 'Fatální chyba';

    switch ($errno) {
        case E_WARNING:
        case E_CORE_WARNING:
        case E_COMPILE_WARNING:
        case E_USER_WARNING:
            $style = 'warning';
            $name = 'Varování';
            break;
        case E_NOTICE:
        case E_USER_NOTICE:
            $style = 'warning';
            $name = 'Upozornění';
            break;
        case E_STRICT:
            $style = 'secondary';
            $name = 'Upozornění (strict)';
    }

    if ($web === false) {
        // Use system handler
        return false;
    }

    ?>
        <div class="alert alert-<?= $style ;?>" role="alert">
            <strong><?= sprintf('%s:', $name); ?></strong>
            <code style="display:block;white-space: pre-wrap"><?= $errstr; ?></code>
            <small><?= sprintf('na řádku %d v souboru: <code>%s</code>', $errline, $errfile); ?></small>
        </div>
    <?php

    return true;
});
