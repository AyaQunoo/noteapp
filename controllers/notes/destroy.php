<?php

$config = require(basepath("config.php"));
$db = new Database($config['database']);
$currentUserId = 4;
$note = $db->Query("SELECT * FROM notes WHERE id = ?", [$_POST["id"]])->findorfail();


authorize($note["userid"] === $currentUserId);

$db->Query("DELETE  FROM notes where id = :id", [
    ":id" => $_POST["id"]
]);
header("location:/notes");
