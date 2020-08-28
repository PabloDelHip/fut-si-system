<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Firebase\JWT\JWT;
use Cookie;

class OrganizacionController extends Controller
{
    public function show()
    {
        return view('admin.organizaciones.show');
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
            
            $response = $client->request('GET', 'organizacion/'.$token_info->usuario->_id);
            
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
            
            $response = $client->request('GET', 'organizacion/'.$id.'/'.$token_info->usuario->_id);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }

    public function saveOrganizacion(Request $request)
    {
        $token = Cookie::get('token');
        $key = 'este-es-el-seed-desarrollo';
        $token_info = JWT::decode($token, $key, array('HS256'));
        //dd($token_info->usuario->_id);
        try {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'localhost:3000',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
                // dd($request->datos[0]);
            
            $response = $client->request('POST', 'organizacion', [
                'form_params' => [

                    'titulo'=> $request->datos[0]['titulo'],
                    'estado_pais'=> $request->datos[0]['estado'],
                    'municipio'=> $request->datos[0]['municipio'],
                    'direccion'=> $request->datos[0]['direccion'],
                    'codigo_postal'=> $request->datos[0]['codigo_postal'],
                    'telefono'=> $request->datos[0]['telefono'],
                    'celular'=> $request->datos[0]['celular'],
                    'email'=> $request->datos[0]['email'],
                    'sitio_web'=> $request->datos[0]['sitio_web'],
                    'notas'=> $request->datos[0]['notas'],
                    'usuario' => $token_info->usuario->_id
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

    public function updateOrganizacion(Request $request,$id)
    {
        
        try {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'localhost:3000',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
                // dd($request->datos[0]);
            
            $response = $client->request('PUT', 'organizacion/'.$id, [
                'form_params' => [
                    'titulo' => $request->datos[0]['titulo'],
                    'estado_pais'=> $request->datos[0]['estado'],
                    'municipio'=> $request->datos[0]['municipio'],
                    'direccion'=> $request->datos[0]['direccion'],
                    'codigo_postal'=> $request->datos[0]['codigo_postal'],
                    'telefono'=> $request->datos[0]['telefono'],
                    'celular'=> $request->datos[0]['celular'],
                    'email'=> $request->datos[0]['email'],
                    'sitio_web'=> $request->datos[0]['sitio_web'],
                    'notas'=> $request->datos[0]['notas']
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
