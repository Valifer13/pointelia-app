<?php

class Controller
{
    // protected function loadModel($model)
    // {
    //     require_once "../app/models/" . $model . ".php";
    //     return new $model();
    // }

    protected function view(
        $viewPath,
        $data = [],
        $title = "New Page",
        $layout = "default"
    ) {
        extract($data);
        require_once "../app/views/" . $layout . "-layout.php";
    }

    protected function json($data = [], int $status = 200)
    {
        return json([
            "success" => true,
            "data" => $data,
            "metadata" => [
                "total" => 100,
                "per_page" => 10,
                "current_page" => 1,
                "last_page" => 10,
                "from" => 1,
                "to" => 10,
                "has_next" => true,
                "has_prev" => false,
            ],
        ], $status);
    }
}
