<?php

class Middleware
{
    const Map = [
        "guests" => Guests::class,
        "auth" => Auth::class

    ];
    public static function resolve($key)
    {
        if (!$key) {
            return;
        }
        $middleware = static::Map[$key] ?? false;
        if (!$middleware) {
            throw new Exception("Error middleware doesnt exist for key {$middleware}", 1);
        }
        (new $middleware)->Handle();
    }
}
