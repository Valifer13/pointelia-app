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
                    "id"       => $teacher['code'],
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
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $db = Database::getInstance();
            $teacherModel = new Teacher($db);

            $teacher = $teacherModel->getTeacherByCode($_SESSION['user']['id']);

            if ($_POST['new_password'] !== $_POST['password_confirm']) {
                Flasher::setFlash("Password harus mirip dengan konfirmasi", "warning");
                header("Location: " . BASE_URL . "/change-password");
                exit;
            }

            if (!password_verify($_POST['old_password'], $teacher['password'])) {
                Flasher::setFlash("Password lama tidak sesuai", "warning");
                header("Location: " . BASE_URL . "/change-password");
                exit;
            }

            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $teacherModel->resetPassword($_SESSION['user']['id'], $new_password);
            Flasher::setFlash("Berhasil mengubah password", "success");
            header("Location: " . BASE_URL . "/account");
            exit;
        }
        $this->view("auth/change-password", [], "Ubah Password");
    }

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            session_destroy();
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }

    public function account()
    {
        $db = Database::getInstance();
        $teacherModel = new Teacher($db);
        $user = $teacherModel->getTeacherByCode($_SESSION['user']['id']);
        $this->view("auth/account", $user, "Akun Profil");
    }
}
