<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Firebase\JWT\JWT;
use Cookie;

class CategoriaController extends Controller
{
    public function show()
    {        
        return view('admin.categoria.show');
    }

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
            
            $response = $client->request('GET', 'categoria/usuario/'.$token_info->usuario->_id);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }

    public function showOneInfo($id)
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
            
            $response = $client->request('GET', 'categoria/'.$id);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }

    public function saveCategoria(Request $request)
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
            
            $response = $client->request('POST', 'categoria', [
                'form_params' => [
                    'titulo' => $request->datos[0]['titulo'],
                    'edad_minima'=> $request->datos[0]['edad_minima'],
                    'edad_maxima'=> $request->datos[0]['edad_maxima'],
                    'usuario'=> $token_info->usuario->_id
                ]
            ]);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }

    public function updateCategoria(Request $request,$id)
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
            
            $response = $client->request('PUT', 'categoria/'.$id, [
                'form_params' => [
                    'titulo' => $request->datos[0]['titulo'],
                    'edad_minima'=> $request->datos[0]['edad_minima'],
                    'edad_maxima'=> $request->datos[0]['edad_maxima'],
                ]
            ]);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }
}
