<?php

define("APP_NAME", "pointeliaapp");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "pointeliadb");
define("DB_PORT", "3306");
// define("BASE_URL", "http://" . (
//     $_SERVER['HTTP_HOST'] !== 'localhost' ? 
//     $_SERVER['HTTP_HOST'] . '/' . APP_NAME : 
//     $_SERVER['HTTP_HOST']
// ) . "/public");

define("BASE_URL", "http://" . (
    $_SERVER['HTTP_HOST'] === APP_NAME . ".test" ?
    $_SERVER['HTTP_HOST'] : 
    $_SERVER['HTTP_HOST'] . "/" . APP_NAME
));