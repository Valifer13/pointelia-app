<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "pointeliadb");
define("DB_PORT", "3306");
define("BASE_URL", $_SERVER['HTTP_HOST'] === 'localhost' ? $_SERVER['HTTP_HOST'] . '/localhost' : $_SERVER['HTTP_HOST']);