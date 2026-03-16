<?php

class HomeController extends Controller
{
    public function index() {
        $this->view('welcome', [],'Welcome Page', "home");
    }

    public function pageNotFound() {
        $this->view('404-page', [], "Halaman Tidak Ditemukan");
    }
}