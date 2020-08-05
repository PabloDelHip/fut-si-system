<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Crypt;
use Firebase\JWT\JWT;
use Cookie;

class InstalacionesController extends Controller
{
    public function saveInstalacion(Request $request)
    {

        try {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'localhost:3000',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
                // dd($request->datos[0]);
            $token = Cookie::get('token');
            $key = 'este-es-el-seed-desarrollo';
            $token_info = JWT::decode($token, $key, array('HS256'));
            
            $response = $client->request('POST', 'instalacion', [
                'form_params' => [
                    'nombre' => $request->datos[0]['nombre'],
                    'estado_pais'=> $request->datos[0]['estado'],
                    'municipio'=> $request->datos[0]['municipio'],
                    'direccion'=> $request->datos[0]['direccion'],
                    'codigo_postal'=> $request->datos[0]['codigo_postal'],
                    'telefono'=> $request->datos[0]['telefono'],
                    'celular'=> $request->datos[0]['celular'],
                    'email'=> $request->datos[0]['email'],
                    'sitio_web'=> $request->datos[0]['sitio_web'],
                    'latitud_map'=> $request->datos[0]['latitud'],
                    'longitud_map'=> $request->datos[0]['longitud'],
                    'vesturios'=> $request->datos[0]['vesturios'],
                    'camisetas'=> $request->datos[0]['camisetas'],
                    'estacionamiento'=> $request->datos[0]['estacionamiento'],
                    'cafeteria'=> $request->datos[0]['cafeteria'],
                    'restaurante'=> $request->datos[0]['restaurante'],
                    'tiendas'=> $request->datos[0]['tiendas'],
                    'notas'=> $request->datos[0]['notas'],
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

    public function saveImageInstalacion(Request $request)
    {
        $image_64 = $request->datos['path'];
        // Nombre de la imagen
        $path = $image_64;

        // Extensión de la imagen
        $type = pathinfo($path, PATHINFO_EXTENSION);

        // Cargando la imagen
        $data = file_get_contents($path);

        // Decodificando la imagen en base64
        $image_64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        // Mostrando el código base64
        echo $image_64;
        
        
        $id_instalacion = $request->id_instalacion;
        
        try {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'localhost:3000',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
    
            
            $response = $client->request('POST', 'save-imagenes-instalaciones', [
                'form_params' => [
                    'imagen_base64' => $image_64,
                    'id_instalacion' => $id_instalacion
                ]
            ]);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json(['mesage' => $response]);
            
            

        } catch (RequestException $e) {
            // $exception = (string) $e->getResponse()->getBody();
            
            // $exception = json_decode($exception);
            // dd($exception);
            
            return response()->json(['mesage' => "Error al guardar una imagen"]);
            
            
        }
        
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
            
            $response = $client->request('GET', 'instalacion/usuario/'.$token_info->usuario->_id);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }

    public function updateInstalacion(Request $request,$id_instalacion)
    {

        
        
        try {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'localhost:3000',
                // You can set any number of default request options.
                'timeout'  => 2.0,
            ]);
            $datos = (array) $request->datos[0];
            // $arr1 = array('foo' , 'bar');
           // array_push($datos, 'foo' , 'bar');
        
            
            $response = $client->request('PUT', 'instalacion/'.$id_instalacion, [
                'form_params' => [
                    'nombre' => $request->datos[0]['nombre'],
                    'estado_pais'=> $request->datos[0]['estado'],
                    'municipio'=> $request->datos[0]['municipio'],
                    'direccion'=> $request->datos[0]['direccion'],
                    'codigo_postal'=> $request->datos[0]['codigo_postal'],
                    'telefono'=> $request->datos[0]['telefono'],
                    'celular'=> $request->datos[0]['celular'],
                    'email'=> $request->datos[0]['email'],
                    'sitio_web'=> $request->datos[0]['sitio_web'],
                    'latitud_map'=> $request->datos[0]['latitud'],
                    'longitud_map'=> $request->datos[0]['longitud'],
                    'vesturios'=> $request->datos[0]['vesturios'],
                    'camisetas'=> $request->datos[0]['camisetas'],
                    'estacionamiento'=> $request->datos[0]['estacionamiento'],
                    'cafeteria'=> $request->datos[0]['cafeteria'],
                    'restaurante'=> $request->datos[0]['restaurante'],
                    'tiendas'=> $request->datos[0]['tiendas'],
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
