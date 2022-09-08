<?php

namespace App\Service;

class Input
{
    public static function exists($type = 'post'): bool
    {
        switch ($type) {
            case 'post':
                return !empty($_POST);
                break;
            case 'get':
                return !empty($_GET);
                break;
            default:
                return false;
                break;
        }
    }

    public static function get($item)
    {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        }
        return '';
    }
}
