<?php

namespace App\Helpers;

use \App\Model\TokenJwt;

class TokenDecode extends TokenJwt {

    private static $key = 'ChaveParaoJWT';

    public static function decode($token) {
        $_token = parent::decodeToken($token, self::$key);
        ob_end_clean();
        return $_token;
    }

}
