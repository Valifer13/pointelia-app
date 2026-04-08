<?php

function activeMenu($page) {
    $current =  trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    return $current == $page ? "bg-white border-blue-500 text-blue-500" : "bg-transparent border-transparent";
}
