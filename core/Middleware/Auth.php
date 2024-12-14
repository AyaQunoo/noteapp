<?php

class Auth
{

    public function Handle()
    {
        if (!$_SESSION["user"] ?? false) {
            header("location:/");
            exit();
        }
    }
}
