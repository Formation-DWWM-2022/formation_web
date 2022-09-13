<?php

namespace App\Service;

class Redirect
{
    public static function to($location = null, $replace = true, $response_code = 200)
    {
        if ($location) {
            if (is_numeric($location)) {
                if ($location == 404) {
                    header('Location: ' . URL_ROOT . '404', true, 404);
                    exit();
                }
            }
            header('Location: ' . URL_ROOT . $location);
            exit();
        }
    }
}
