<?php

$routes = [
    // Landing Page
    "" => ["controller" => "HomeController", "method" => "index"],

    // Auth routes
    "login/teacher"    => [ "controller" => "AuthController", "method" => "login_teacher"], 
    "login/student"    => [ "controller" => "AuthController", "method" => "login_student"], 
    "logout"           => [ "controller" => "AuthController", "method" => "logout"], 
    "change-password"  => [ "controller" => "AuthController", "method" => "change_password"], 
    "account"          => [ "controller" => "AuthController", "method" => "account"], 

    // Dashboard
    "dashboard" => [ "controller" => "DashboardController", "method" => "index"], 

    // Student routes
    "students"        => ["controller" => "StudentController", "method" => "index"],
    "students/page"   => ["controller" => "StudentController", "method" => "index_with_pagination"],
    "students/add"    => ["controller" => "StudentController", "method" => "add"],
    "students/detail" => ["controller" => "StudentController", "method" => "detail"],
    "students/delete" => ["controller" => "StudentController", "method" => "delete"],
    "students/edit"   => ["controller" => "StudentController", "method" => "edit"],

    // Student api routes
    "students_api/detail" => ["controller" => "StudentApiController", "method" => "detail"],

    // Teacher routes
    "teachers"        => ["controller" => "TeacherController", "method" => "index"],
    "teachers/page"   => ["controller" => "TeacherController", "method" => "index_with_pagination"],
    "teachers/add"    => ["controller" => "TeacherController", "method" => "add"],
    "teachers/detail" => ["controller" => "TeacherController", "method" => "detail"],
    "teachers/delete" => ["controller" => "TeacherController", "method" => "delete"],
    "teachers/edit"   => ["controller" => "TeacherController", "method" => "edit"],

    // Violation routes
    "violations"        => ["controller" => "StudentViolationController", "method" => "index"],
    "violations/page"   => ["controller" => "StudentViolationController", "method" => "index_with_pagination"],
    "violations/add"    => ["controller" => "StudentViolationController", "method" => "add"],
    "violations/detail" => ["controller" => "StudentViolationController", "method" => "detail"],
    // "violations/delete" => ["controller" => "StudentViolationController", "method" => "delete"],
    // "violations/edit"   => ["controller" => "StudentViolationController", "method" => "edit"],

    // Violation Types routes
    "violation-types"        => ["controller" => "ViolationTypeController", "method" => "index"],
    "violation-types/page"   => ["controller" => "ViolationTypeController", "method" => "index_with_pagination"],
    "violation-types/add"    => ["controller" => "ViolationTypeController", "method" => "add"],
    // "violation-types/detail" => ["controller" => "ViolationTypeController", "method" => "detail"],
    "violation-types/delete" => ["controller" => "ViolationTypeController", "method" => "delete"],
    "violation-types/edit"   => ["controller" => "ViolationTypeController", "method" => "edit"],

    // Guardian routes
    "guardians"        => ["controller" => "GuardianController", "method" => "index"],
    "guardians/page"   => ["controller" => "GuardianController", "method" => "index_with_pagination"],
    "guardians/add"    => ["controller" => "GuardianController", "method" => "add"],
    // "guardians/detail" => ["controller" => "GuardianController", "method" => "detail"],
    "guardians/delete" => ["controller" => "GuardianController", "method" => "delete"],
    "guardians/edit"   => ["controller" => "GuardianController", "method" => "edit"],

    // Class routes
    "classes"        => ["controller" => "StudentClassController", "method" => "index"],
    "classes/page"   => ["controller" => "StudentClassController", "method" => "index_with_pagination"],
    "classes/add"    => ["controller" => "StudentClassController", "method" => "add"],
    "classes/detail" => ["controller" => "StudentClassController", "method" => "detail"],
    "classes/delete" => ["controller" => "StudentClassController", "method" => "delete"],
    "classes/edit"   => ["controller" => "StudentClassController", "method" => "edit"],

    // Major routes
    "majors"        => ["controller" => "MajorController", "method" => "index"],
    "majors/page"   => ["controller" => "MajorController", "method" => "index_with_pagination"],
    "majors/add"    => ["controller" => "MajorController", "method" => "add"],
    "majors/detail" => ["controller" => "MajorController", "method" => "detail"],
    "majors/delete" => ["controller" => "MajorController", "method" => "delete"],
    "majors/edit"   => ["controller" => "MajorController", "method" => "edit"],

    // Letter routes
    "letters"      => ["controller" => "LetterController", "method" => "index"],
    "letters/page" => ["controller" => "LetterController", "method" => "index_with_pagination"],

    "letters/add-student-agreement-letter"  => ["controller" => "LetterController", "method" => "add_student_agreement_letter"],
    "letters/add-guardian-invit-letter"     => ["controller" => "LetterController", "method" => "add_guardian_invit_letter"],
    "letters/add-guardian-agreement-letter" => ["controller" => "LetterController", "method" => "add_guardian_agreement_letter"],
    "letters/add-school-transfer-letter"    => ["controller" => "LetterController", "method" => "add_school_transfer_letter"],
    "letters/add-point-reduction-letter"    => ["controller" => "LetterController", "method" => "add_point_reduction_letter"],

    "letters/student-agreement-letter"  => ["controller" => "LetterController", "method" => "student_agreement_letter"],
    "letters/guardian-invit-letter"     => ["controller" => "LetterController", "method" => "guardian_invit_letter"],
    "letters/guardian-agreement-letter" => ["controller" => "LetterController", "method" => "guardian_agreement_letter"],
    "letters/school-transfer-letter"    => ["controller" => "LetterController", "method" => "school_transfer_letter"],
    "letters/point-reduction-letter"    => ["controller" => "LetterController", "method" => "point_reduction_letter"],
];