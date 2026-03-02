<?php

function get_breadcrumb($divider = '/')
{
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($uri);
    if ($uri[0] == "public") {
        array_shift($uri);
    }

    $current_full_url = BASE_URL;
    $html = "
    <div class=\"flex gap-1 text-zinc-400 *:hover:text-zinc-950 *:hover:underline\">
    ";

    foreach ($uri as $item) {
        $current_full_url .= ('/' . $item);
        $html .= "<a href='$current_full_url'>" . ucwords($item) . "</a> \ ";
    }

    $html = rtrim($html);
    $html = rtrim($html, '\\');
    $html .= "</div>";

    echo $html;
}
