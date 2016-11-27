<?php

define('ROOT', __DIR__.'/..');
// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

ini_set('display_errors', 1);
ob_start();

require ROOT."/init_config.php";
require ROOT."/vendor/autoload.php";

$start = (new \App\App())->run();
