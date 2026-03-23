<?php 

class AuthMiddleware
{
    public static function check()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }
    }
}