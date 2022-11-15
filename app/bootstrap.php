<?php

session_start();

define("BASE_PATH", __DIR__);
define("ENCRYPTION_KEY", '!@@#%_my_secret_key_for_encryption_@#$!&');

//load autoload file created by Composer
require "../vendor/autoload.php";


//init config package and loads all files in /config folder
use Illuminate\Config\Repository;

$configPath = BASE_PATH . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR;

$config = new Repository();

foreach (glob($configPath . "*.php") as $phpFile) {
    $config->set(
        basename($phpFile, '.php'),
        require_once "$phpFile"
    );
}

// init all the files in /routes folder
$routesPath = BASE_PATH . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR;
foreach (glob($routesPath . "*.php") as $phpFile) {
    require_once "$phpFile";
}

// initialize Illuminate Database library
$dbConfig = $config->get("app.db");

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();
$capsule->bootEloquent();
?>