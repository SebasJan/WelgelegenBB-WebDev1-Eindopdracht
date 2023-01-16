<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

# for error reporting to screen
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

# require the router
require __DIR__ . '/../patternrouter.php';

# url -> uri
$uri = trim($_SERVER['REQUEST_URI'], '/');

# route the request
$router = new PatternRouter();
$router->route($uri);
?>