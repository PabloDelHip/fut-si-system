<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class LoginToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        try { 
            $token = Cookie::get('token');
            $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'localhost:3000',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        
        $response = $client->request('GET', 'validar-token',[
            'headers' => [
                'token' => $token
                ]]);
        
        
        return $next($request);

        } catch (ClientException $e) {
            $err = $e;
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return redirect('login');
        }
        
        
    }
}
