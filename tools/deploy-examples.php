<?php
/** @noinspection PhpLanguageLevelInspection */
/** @noinspection UnNecessaryDoubleQuotesInspection */
/** @noinspection ThrowRawExceptionInspection */
/** @noinspection AutoloadingIssuesInspection */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection DuplicatedCode */
declare(strict_types=1);

namespace Tools\Deploy\DeployToDev;

/*
 * Deploy script pro vytvoření balíčku s examples
 * Vyžaduje PHP 7.3+
 *
 * Usage: php deploy-examples.php <version>
 * @internal
 */

use Exception;


// Prevent use at non-cli API
if (PHP_SAPI !== 'cli') {
    http_response_code(400);
    die('ERROR: Tool is callable only from command-line' . PHP_EOL);
}
// Parse & validate command arguments
if ($argc !== 2) {
    throw new Exception(sprintf('Usage: %s <version>',
        basename(__FILE__)));
}
$version = $argv[1];

$rootDir = __DIR__ . '/..';
$distDir = __DIR__ . '/../dist';

$dirName = basename(realpath($rootDir));
$zipBaseName = $rootDir . '/..';
$zipFileName = $dirName . '-' . $version . '-examples.zip';

$commands = [
    "rm -rf {$distDir} && ",
    "mkdir {$distDir} && ",
    "cd {$zipBaseName} &&",
    "zip -r ",
    "--exclude='./{$dirName}/.git/*'",
    "--exclude='./{$dirName}/.idea/*'",
    "--exclude='./{$dirName}/.DS_Store/*'",
    "--exclude='./{$dirName}/dist/*'",
    "--exclude='./{$dirName}/tools/*'",
    "--exclude='./{$dirName}/.git*'",
    "{$distDir}/{$zipFileName} ./{$dirName}"
];

$command = implode(' ', $commands);
invokeSafe($command);


/**
 * Translite relative path to absolute based on $prefix
 * @param string $path
 * @param string $prefix
 * @return string
 */
function getAbsolutePath(string $path, string $prefix): string
{
    if (strpos($path, '/') === 0) {
        return $path;
    }

    return realpath(joinPaths($prefix, $path));
}

/**
 * Join parts of filesystem's paths (sub-directories) without traling slashes
 * @param string[] $paths
 * @return string
 */
function joinPaths(string ...$paths)
{
    $path = '';
    foreach ($paths as $i => $value) {
        $cur = rtrim($value, '/');

        // Keep left trailing "/" only on first part
        if ($i > 0) {
            $cur = ltrim($cur, '/');
        }

        // Skip empty part
        if ($cur === '') {
            continue;
        }

        $sep = $path === '' ? '' : '/';
        $path .= $sep . $cur;
    }

    return $path;
}

/**
 * Safe call of system CLI commands
 * @param string $command
 * @throws \Exception
 */
function invokeSafe(string $command)
{
    //echo $command . PHP_EOL;
    system($command, $returnVal);

    if ($returnVal !== 0) {
        throw new \Exception('Command failed: ' . $command);
    }
}
