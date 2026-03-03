<?php

function get_breadcrumb($divider = '/')
{
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($uri);
    if ($uri[0] == "public") {
        array_shift($uri);
    }

    $current_full_url = BASE_URL;
    // $html = "
    // <div class=\"flex gap-1 text-zinc-400 *:hover:text-zinc-950 *:hover:underline\">
    // ";

    $html = '
            <nav aria-label="Breadcrumb">
                <ol class="flex items-center gap-1 text-sm text-gray-700">
    ';

    foreach ($uri as $item) {
        $current_full_url .= ('/' . $item);
        $html .= '
                    <li>
                        <a href="' . $current_full_url . '" class="block transition-colors hover:text-gray-900"> ' . ucwords($item) . ' </a>
                    </li>
        ';

        if ($item === $uri[array_key_last($uri)]) {
            continue;
        }

        $html .= '
                    <li class="rtl:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
        ';
    }

    $html = rtrim($html);
    $html = rtrim($html, '\\');
    $html .= "
                </ol>
            </nav>
    ";

    echo $html;
}
