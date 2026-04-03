<?php 

class AuthMiddleware
{
    public static function checkRoleForBool($roles = []): bool
    {
        if (in_array(strtolower($_SESSION['user']['role']), $roles)) {
            return true;
        }
        return false;
    }

    public static function check()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/login/teacher");
            exit;
        }
    }

    public static function checkRole($roles = []) {
        if (!in_array(strtolower($_SESSION['user']['role']), $roles)) {
            header("Location: " . BASE_URL . "/dashboard");
            Flasher::setFlash("Anda tidak memiliki akses.", "warning");
            exit;
        }
    }

    public static function checkGuest()
    {
        if (isset($_SESSION['user'])) {
            Flasher::setFlash("Logout untuk login kembali.", "warning");
            header("Location: " . BASE_URL . "/dashboard");
            exit;
        }
    }
}