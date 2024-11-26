<?php
$config = require(basepath("config.php"));
$db = new Database($config['database']);
$errors = [];

$body = $_POST["note"];

if (!Validator::string($body, 1, 900)) {
    $errors["body"] = "the note with max 900 char is required!!";
}

if (!empty($errors)) {
    view('/notes/create.view.php', [
        "header" => "create note",
        "errors" => $errors

    ]);
    exit();
}

$db->Query("INSERT INTO notes(userid,body) VALUES(:userid,:body);", [
    ":userid" => 4,
    ":body" => $_POST["note"]
]);
header("location:/notes");
