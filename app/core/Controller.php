<?php

class Controller
{
    protected function loadModel($model)
    {
        require_once "../app/models/" . $model . ".php";
        return new $model();
    }

    protected function renderView(
        $viewPath,
        $data = [],
        $title = "New Page",
    ) {
        extract($data);
        require_once "../app/views/layout.php";
    }
}
