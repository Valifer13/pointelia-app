<?php 

function get_breadcrumb($divider = '/') {
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($uri);
    array_shift($uri);

    $current_full_url = BASE_URL;
    $html = "";

    foreach($uri as $item)
    {
        $current_full_url .= ('/' . $item);
        $html .= "<a href='$current_full_url'>$item</a> / ";
    } 

    $html = rtrim($html);
    $html = rtrim($html, '/');
    echo $html;
}

?>