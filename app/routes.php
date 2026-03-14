<?php

$routes = [
    // Landing Page
    "" => ["controller" => "HomeController", "method" => "index"],

    // Dashboard
    "dashboard" => [ "controller" => "DashboardController", "method" => "index"], 

    // Student routes
    "students"        => ["controller" => "StudentController", "method" => "index"],
    "students/add"    => ["controller" => "StudentController", "method" => "add"],
    "students/detail" => ["controller" => "StudentController", "method" => "detail"],
    "students/delete" => ["controller" => "StudentController", "method" => "delete"],
    "students/edit"   => ["controller" => "StudentController", "method" => "edit"],

    // Teacher routes
    "teachers"        => ["controller" => "TeacherController", "method" => "index"],
    "teachers/add"    => ["controller" => "TeacherController", "method" => "add"],
    "teachers/detail" => ["controller" => "TeacherController", "method" => "detail"],
    "teachers/delete" => ["controller" => "TeacherController", "method" => "delete"],
    "teachers/edit"   => ["controller" => "TeacherController", "method" => "edit"],

    // Violation routes
    "violations"        => ["controller" => "StudentViolationController", "method" => "index"],
    "violations/add"    => ["controller" => "StudentViolationController", "method" => "add"],
    "violations/detail" => ["controller" => "StudentViolationController", "method" => "detail"],
    // "violations/delete" => ["controller" => "StudentViolationController", "method" => "delete"],
    // "violations/edit"   => ["controller" => "StudentViolationController", "method" => "edit"],

    // Violation Types routes
    "violation-types"        => ["controller" => "ViolationTypeController", "method" => "index"],
    "violation-types/add"    => ["controller" => "ViolationTypeController", "method" => "add"],
    "violation-types/detail" => ["controller" => "ViolationTypeController", "method" => "detail"],
    "violation-types/delete" => ["controller" => "ViolationTypeController", "method" => "delete"],
    "violation-types/edit"   => ["controller" => "ViolationTypeController", "method" => "edit"],

    // Guardian routes
    "guardians"        => ["controller" => "GuardianController", "method" => "index"],
    "guardians/add"    => ["controller" => "GuardianController", "method" => "add"],
    "guardians/detail" => ["controller" => "GuardianController", "method" => "detail"],
    "guardians/delete" => ["controller" => "GuardianController", "method" => "delete"],
    "guardians/edit"   => ["controller" => "GuardianController", "method" => "edit"],

    // Class routes
    "classes"        => ["controller" => "ClassController", "method" => "index"],
    "classes/add"    => ["controller" => "ClassController", "method" => "add"],
    "classes/detail" => ["controller" => "ClassController", "method" => "detail"],
    "classes/delete" => ["controller" => "ClassController", "method" => "delete"],
    "classes/edit"   => ["controller" => "ClassController", "method" => "edit"],
];