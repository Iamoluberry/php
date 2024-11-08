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

    return BASE_PATH . 'views/' . $path;
}