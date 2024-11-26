<?php


$config = require(basepath("config.php"));
$db = new Database($config['database']);

$notes = $db->Query("SELECT * FROM notes WHERE userid = 4")->get();

view("notes/index.view.php", [
    "header" => "Notes",
    "notes" => $notes

]);
