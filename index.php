<?php

// Define minimum supported PHP version
define('MY_PHP_VERSION', '5.6.4');

// Check PHP version
if (version_compare(PHP_VERSION, MY_PHP_VERSION, '<')) {
    die('Your host needs to use PHP ' . MY_PHP_VERSION . ' or higher to run Inventree');
}

// Register the auto-loader
require(__DIR__.'/bootstrap/autoload.php');

// Load the app
$app = require_once(__DIR__.'/bootstrap/app.php');

// Run the app
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
