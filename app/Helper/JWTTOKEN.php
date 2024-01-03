<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use http\Env\Request;

class JWTTOKEN
{
    static function createToken($email,$id)
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',
            'aud' => 'Sabbir Hossain',
            'iat' => time(),
            'exp'=>time()+60*60,
            'nbf' => 135700000,
            'email'=>$email,
            'id'=> $id
        ];

       return JWT::encode($payload, $key, 'HS256');
    }


    static function decodeToken($token)
    {
        try {

            if ($token == null) {
                return "Unauthorized";
            } else {

                $key = env('JWT_KEY');

                return JWT::decode($token, new Key($key, 'HS256'));
            }



        } catch (Exception $exception) {
            return "Unauthorized";
        }
    }
}
