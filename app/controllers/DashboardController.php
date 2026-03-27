<?php 

class DashboardController extends Controller
{
    public function __construct()
    {
        AuthMiddleware::check();
    }

    public function index() {
        $this->view("dashboard", [], "Dashboard");
    }
}