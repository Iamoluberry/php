<?php

use Core\Response;

function dd($value){

    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value){
    return $_SERVER["REQUEST_URI"] === $value;
}

function authorize($condition)
{
    if ($condition === false) {
        abort(Response::FORBIDDEN);
    }
}

function abort($statusCode = Response::NOT_FOUND)
{
    http_response_code($statusCode);

    require basePath("controllers/{$statusCode}.php");

    die();
}

function basePath($path){

    return BASE_PATH . $path;
}

function view($path, $attributes = []){
    extract($attributes);

    require(BASE_PATH . 'views/' . $path);
    exit();
}

function navLink($uri, $addressName, $classProps = ''){
    echo "
    <a href=\"$uri\"
       class=\"" . (urlIs($uri) ? "rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white $classProps" : "rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white $classProps") . "\"
       aria-current=\"page\">$addressName
       </a>";
}

function redirect($uri)
{
    header("Location: $uri");
    exit();
}