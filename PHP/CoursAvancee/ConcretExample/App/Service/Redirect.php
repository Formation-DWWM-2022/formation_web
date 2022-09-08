<?php

namespace App\Service;

class Redirect
{
    public static function to($location = null)
    {
        if ($location) {
            if (is_numeric($location)) {
                if ($location == 404) {
                    header('Location: ' . URL_ROOT . '404', true, 'HTTP/1.0 404 Not Found');
                    exit();
                }
            }
            header('Location: ' . URL_ROOT . $location);
            exit();
        }
    }
}
