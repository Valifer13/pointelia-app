<?php

class HomeController extends Controller
{
    public function index() {
        $this->view('welcome', [],'Welcome Page', "home");
    }
}