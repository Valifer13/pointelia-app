<?php

class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $db = Database::getInstance();
            $teacherModel = new Teacher($db);
            $teacher = $teacherModel->getTeacherByUsername($username);

            if ($teacher && password_verify($password, $teacher['password'])) {
                $_SESSION['user'] = [
                    "code"     => $teacher['code'],
                    "username" => $teacher['username'],
                    "fullname" => $teacher['fullname'],
                    "role"     => $teacher['role']
                ];

                header("Location: " . BASE_URL . "/dashboard");
                exit;
            }

            $_SESSION['error'] = [
                "message" => "Username atau password salah",
            ];
            header("Location: " . BASE_URL . "/login");
            exit;
        }

        require_once "../app/views/auth/login.php";
    }

    public function change_password()
    {
        require_once "../app/views/auth/change-password.php";
    }

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            session_destroy();
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }
}
