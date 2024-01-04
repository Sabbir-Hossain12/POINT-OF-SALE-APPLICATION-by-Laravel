<?php

namespace App\Http\Middleware;

use App\Helper\JWTTOKEN;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class tokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

    $token= $request->cookie('token');
    $result= JWTTOKEN::verifyToken($token);

    if($result=="unauthorized")
    {
        return redirect('/login');

    }
    else
    {
        $request->headers->set('email',$result->email);
        $request->headers->set('id',$result->id);
        return $next($request);
    }


    }
}
