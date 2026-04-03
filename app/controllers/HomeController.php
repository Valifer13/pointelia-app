<?php

class HomeController extends Controller
{
    public function index() {
        // $this->view('welcome', [],'Welcome Page', "home");
        require_once "../app/views/welcome.php";
    }

    public function pageNotFound() {
        $this->view('404-page', [], "Halaman Tidak Ditemukan");
    }
}