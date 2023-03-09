<?php

namespace App\Core;

use Exception;

class App
{
    protected static $keys = [];

    // The mutator method
    public static function bind($key, $value)
    {
        static::$keys[$key] = $value;
    }

    /**
     * @throws Exception
     */

    // The accessor method
    public static function get($key)
    {
        if(!array_key_exists($key,static::$keys)){
            throw new Exception("No {$key} is bound in the container.");
        }
        return static::$keys[$key];
    }
}