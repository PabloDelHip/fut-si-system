<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Firebase\JWT\JWT;
use Cookie;

class ModoJuegoController extends Controller
{
    public function showInfo()
    {

        $token = Cookie::get('token');
        $key = 'este-es-el-seed-desarrollo';
        $token_info = JWT::decode($token, $key, array('HS256'));
        
        try {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'localhost:3000',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
                // dd($request->datos[0]);
            
            $response = $client->request('GET', 'modos_juego');
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }
}
