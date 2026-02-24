<?php

$routes = [
    "" => ["controller" => "HomeController", "method" => "index"],
    "students" => ["controller" => "StudentController", "method" => "index"],
    "students/add" => ["controller" => "StudentController", "method" => "add"],
    "students/detail" => ["controller" => "StudentController", "method" => "detail"],
    "students/delete" => ["controller" => "StudentController", "method" => "delete"],
    "students/edit" => ["controller" => "StudentController", "method" => "edit"],
];