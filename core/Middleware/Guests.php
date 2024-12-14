<?php
class Guests
{
    public function Handle()
    {
        if ($_SESSION["user"] ?? false) {
            header("location:/");
            exit();
        }
    }
}
