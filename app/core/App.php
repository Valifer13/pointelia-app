<?php

class App
{
    protected $controller = "HomeController";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        require_once "../app/routes.php";

        if (isset($url[0])) {
            $route = $url[0];
        }

        if (isset($url[1])) {
            $route = $url[0] . '/' . $url[1];
        }

        if (isset($routes[$route])) {
            $this->controller = $routes[$route]['controller'];
            $this->method = $routes[$route]['method'];
            $this->params = array_slice($url, 2);
        } else {
            $this->controller = "HomeController";
            $this->method = "pageNotFound";
        }

        if (!str_contains($this->controller, "Api")) {
            require_once '../app/controllers/' . $this->controller . '.php';
        } else {
            require_once '../app/api/' . $this->controller . '.php';
        }
        $this->controller = new $this->controller;

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }

        return [''];
    }
}
