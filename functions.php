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
function login($user)
{
    $_SESSION["user"] = [
        "email" => $user["email"]
    ];
}
function logout()
{
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie("PHPSESSID", " ", time() - 3600, $params["path"], $params["domain"], $params["secure"], $params['httponly']);
}
