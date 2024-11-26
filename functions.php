<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);

    echo "<pre>";
    die();
}

function isUrl($url)
{

    return $_SERVER["REQUEST_URI"] === $url;
}
function port($statusCode = 404)
{
    http_response_code($statusCode);
    require "views/$statusCode.php";
    die();
}
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        port($status);
    }
}
function basepath($file)
{
    return BASE_PATH . $file;
}
function view($file, $parameters = [])
{
    extract($parameters);
    require basepath('/views/' . $file);
}
