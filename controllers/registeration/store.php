<?php


$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];
//validate inputs 
if (!Validator::email($email)) {
    $errors["email"] = "pls enter a valid email";
}
if (!Validator::string($password, 7, 255)) {
    $errors["password"] = "pls enter a password of minimun of 7 charechters";
}

if (!empty($errors)) {
    view("registeration/register.view.php", [
        "errors" => $errors,
        "header" => "register"
    ]);
} else {
    $config = require(basepath("config.php"));
    $db = new Database($config['database']);
    $result = $db->Query("SELECT email from users WHERE email = :email;", [
        ":email" => $email
    ])->find();
    if ($result) {
        view("registeration/register.view.php", [
            "errors" => ["email" => "email is already exists"],
            "header" => "register"
        ]);
        exit();
    } else {
        $db->Query("INSERT INTO users(password,email) VALUES(:password,:email)", [
            ":email" => $email,
            ":password" => password_hash($password, PASSWORD_BCRYPT)
        ]);
        login([
            "email" => $email
        ]);

        header("location:/");
        exit();
    }
}
