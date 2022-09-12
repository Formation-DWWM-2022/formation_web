<?php

namespace App\Service;

class Token {

    public static function generate(): string
    {
        return Session::put(TOKEN_NAME, md5(uniqid()));
    }

    public static function check($token): bool
    {
        $tokenName = TOKEN_NAME;
        if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }

}
