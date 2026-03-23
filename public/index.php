<?php

if(!session_id()) session_start();

require_once '../app/config/config.php';

spl_autoload_register(function () {
    $paths = [
        "../app/helpers"
    ];

    foreach ($paths as $path) {
        $file = $path . ".php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

spl_autoload_register(function ($class) {
    $paths = [
        "../app/core/",
        "../app/models/",
        "../app/controllers/",
        "../app/services/",
        "../app/middlewares/"
    ];

    foreach ($paths as $path) {
        $file = $path . $class . ".php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

foreach (glob('../app/helpers/*.php') as $file) {
    require_once $file;
}

$app = new App();