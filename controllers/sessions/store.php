<?php

$config = require(basepath("config.php"));
$db = new Database($config['database']);

$email = $_POST["email"];
$password = $_POST["password"];
$errors = [];
if (!Validator::email($email)) {
    $errors["email"] = "pls enter a valid email";
}
if (!Validator::string($password)) {
    $errors["password"] = "pls enter a valid password";
}
if (!empty($errors)) {
    return view("sessions/login.view.php", [
        "errors" => $errors,
        "header" => "log in"
    ]);
}

$user = $db->Query("SELECT * FROM users WHERE email = :email", [
    ":email" => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {

        login($user);
        header("location:/");
        exit();
    }
}

return view("sessions/login.view.php", [
    "errors" => ["password" => "password or email doesnt match "],
    "header" => "log in"
]);
