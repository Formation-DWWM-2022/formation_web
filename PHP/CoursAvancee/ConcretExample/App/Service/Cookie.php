<?php

namespace App\Service;

class Cookie {

    public static function exists($name): bool
    {
        return isset($_COOKIE[$name]);
    }

    public static function get($name) {
        return $_COOKIE[$name];
    }

    public static function put($name, $value, $expiry): bool
    {
        if(setcookie($name, $value, time() + $expiry, '/')) {
            return true;
        }
        return false;
    }

    public static function delete($name) {
        self::put($name, '', time() -1);
    }

}
