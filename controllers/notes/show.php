<?php
$config = require(basepath("config.php"));
$db = new Database($config['database']);
$currentUserId = 4;
$note = $db->Query("SELECT * FROM notes WHERE id = ?", [$_GET["id"]])->findorfail();


authorize($note["userid"] === $currentUserId);
view('/notes/show.view.php', [

    "header" => "Note no." . $note["id"],
    "note" => $note

]);
