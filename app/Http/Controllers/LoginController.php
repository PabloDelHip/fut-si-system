<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Cookie;
use Redirect;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class LoginController extends Controller
{
    public function login()
    {
        // $client = new Client([
        //     // Base URI is used with relative requests
        //     'base_uri' => 'localhost:3000',
        //     // You can set any number of default request options.
        //     'timeout'  => 2.0,
        // ]);
        
        // $response = $client->request('GET', 'usuario',[
        //     'headers' => [
        //         'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c3VhcmlvIjp7InJvbGUiOiJVU0VSX1JPTEUiLCJlc3RhZG8iOnRydWUsIl9pZCI6IjVlN2Q0MDIwNTE4NGFhMTNiODc0ZDkzOCIsIm5vbWJyZSI6InRlc3QxIiwiZW1haWwiOiJ0ZXN0MUBnbWFpbC5jb20iLCJfX3YiOjB9LCJpYXQiOjE1OTQwNTU4MjcsImV4cCI6MTU5NDA1ODQxOX0.ygR3Z49oEye7AH6enr_eWCI_WEGCUJ5EBVNUHZJWRQE'
        //         ]]);
        
        // $post = json_decode($response->getBody()->getContents());
        // dd($post->usuario);
        return view('admin.login.login');
    }

    public function datosLogin(Request $request)
    {
        try {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'localhost:3000',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
    
    
            $response = $client->request('POST', 'login', [
                'form_params' => [
                    'email' => $request->email,
                    'password' => $request->password
                ]
            ]);
            
            $response = json_decode($response->getBody()->getContents());
            Cookie::queue('token',$response->token, 120);
            return Redirect::route('panel-fut-si');

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return Redirect::route('login')
                    ->with('message', $exception->err->message);
        }
    }
}
