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

    static function createTokenForOtp($email)
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',
            'aud' => 'Sabbir Hossain',
            'iat' => time(),
            'exp'=>time()+60*10,
            'nbf' => 135700000,
            'email'=>$email

        ];

        return JWT::encode($payload, $key, 'HS256');
    }



    static function verifyToken($token)
    {
        try {

            if ($token == null) {
                return "unauthorized";
            } else {

                $key = env('JWT_KEY');

                $decode= JWT::decode($token, new Key($key, 'HS256'));

                return $decode->email;
            }



        } catch (Exception $exception) {
            return "unauthorized";
        }
    }
}
