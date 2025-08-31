<?php

// force to show errors
error_reporting(E_ALL);
ini_set('display_errors', '1');

use Illuminate\Support\Facades\Artisan;

// Make sure we load the Laravel bootstrap
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Get the console kernel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Run the Artisan commands
Artisan::call('config:clear');
echo Artisan::output();

Artisan::call('cache:clear');
echo Artisan::output();

Artisan::call('route:clear');
echo Artisan::output();

Artisan::call('view:clear');
echo Artisan::output();
echo "Cache cleared successfully.\n";