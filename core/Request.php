<?php

namespace App\Core;

class Request
{
    public static function uri(){
        return trim($_SERVER['PATH_INFO'] ?? '/', '/');
    }
    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}