<?php

$routes = [
    "" => ["controller" => "HomeController", "method" => "index"],
    "students" => ["controller" => "StudentController", "method" => "index"],
    "students/add" => ["controller" => "StudentController", "method" => "add"],
    "students/detail" => ["controller" => "StudentController", "method" => "detail"],
    "students/delete" => ["controller" => "StudentController", "method" => "delete"],
    "students/edit" => ["controller" => "StudentController", "method" => "edit"],

    "teachers" => ["controller" => "TeacherController", "method" => "index"],
    "teachers/add" => ["controller" => "TeacherController", "method" => "add"],
    "teachers/detail" => ["controller" => "TeacherController", "method" => "detail"],
    "teachers/delete" => ["controller" => "TeacherController", "method" => "delete"],
    "teachers/edit" => ["controller" => "TeacherController", "method" => "edit"],
];