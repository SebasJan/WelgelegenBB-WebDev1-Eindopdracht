<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

# for error reporting to screen
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

# require the router
require __DIR__ . '/../patternrouter.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);
?>