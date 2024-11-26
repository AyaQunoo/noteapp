<?php
$config = require(basepath("config.php"));
$db = new Database($config['database']);
$currentUserId = 4;
$errors = [];

$note = $db->Query("SELECT * FROM notes WHERE id = ?", [$_POST["id"]])->findorfail();


authorize($note["userid"] === $currentUserId);

$body = $_POST["note"];

if (!Validator::string($body, 1, 900)) {
    $errors["body"] = "the note with max 900 char is required!!";
}

if (!empty($errors)) {
    view('/notes/edit.view.php', [
        "header" => "edit note",
        "errors" => $errors,
        "note" => $note

    ]);
    exit();
}

$db->Query("UPDATE notes SET body =:body where  id = :id ", [
    ":id" => $_POST['id'],
    ":body" => $body
]);
header("location:/notes");
