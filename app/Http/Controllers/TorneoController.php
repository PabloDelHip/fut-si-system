<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Firebase\JWT\JWT;
use Cookie;

class TorneoController extends Controller
{

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {        
        return view('admin.torneo.show');
    }

    public function show()
    {

        $token = Cookie::get('token');
        $key = 'este-es-el-seed-desarrollo';
        $token_info = JWT::decode($token, $key, array('HS256'));
        
        try {
            
            
            $response = $this->client->request('GET', 'torneos/usuario/'.$token_info->usuario->_id);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }

    public function showInfo($id_torneo)
    {
        try{    
            $response = $this->client->request('GET', 'torneos-instalaciones/torneo/'.$id_torneo);
            
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
            
            
        }
    }

    public function save(Request $request)
    {    
         
        try {
            $token = Cookie::get('token');
            $key = 'este-es-el-seed-desarrollo';
            $token_info = JWT::decode($token, $key, array('HS256'));
            
            $response = $this->client->request('POST', 'torneos', [
                'form_params' => [
                    'nombre' => $request->datos[0]['nombre'],
                    'duracion_tiempo' => $request->datos[0]['duracion_tiempo'],
                    'sexo_jugadores' => $request->datos[0]['sexo_jugadores'],
                    'fecha_inicio' => $request->datos[0]['fecha_inicio'],
                    'fecha_final_temporada' => $request->datos[0]['fecha_final_temporada'],
                    'fecha_limite_pagos' => $request->datos[0]['fecha_limite_pagos'],
                    'costo_inscripcion' => $request->datos[0]['costo_inscripcion'],
                    'costo_albitraje' => $request->datos[0]['costo_albitraje'],
                    'notas' => $request->datos[0]['notas'],
                    'lunes' => $request->datos[0]['lunes'],
                    'martes' => $request->datos[0]['martes'],
                    'miercoles' => $request->datos[0]['miercoles'],
                    'jueves' => $request->datos[0]['jueves'],
                    'viernes' => $request->datos[0]['viernes'],
                    'sabado' => $request->datos[0]['sabado'],
                    'domingo' => $request->datos[0]['domingo'],
                    // 'instalacion' => $request->datos[0]['instalaciones'][0]['_id'],
                    'categoria' => $request->datos[0]['categoria'],
                    'tipo_torneo' => $request->datos[0]['tipo_torneo'],
                    'modo_juego' => $request->datos[0]['modo_juego'],
                    'campeon' => $request->datos[0]['campeon'],
                    'equipos_clasifican_final' => $request->datos[0]['equipos_clasifican_final'],
                    'vueltas_torneo' => $request->datos[0]['vueltas_torneo'],
                    'vueltas_eliminacion' => $request->datos[0]['vueltas_eliminacion'],
                    'vueltas_final' => $request->datos[0]['vueltas_final'],
                    'usuario' => $token_info->usuario->_id
                ]
            ]);
            
            $response = json_decode($response->getBody()->getContents());
            $this->saveTorneoInstalacion($response->torneo->_id,$request->datos[0]['instalaciones'],$token_info->usuario->_id);
           
            return response()->json($response);

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
        }
    }

    public function saveTorneoInstalacion($id_torneo,$instalaciones,$id_usuario)
    {    
         

        try {

            $num_instalaciones = sizeof($instalaciones);
            for ($i=0; $i < $num_instalaciones ; $i++) { 
                $response = $this->client->request('POST', 'torneos-instalaciones', [
                    'form_params' => [
                        'torneo' => $id_torneo,
                        'instalacion' => $instalaciones[$i]['_id'],
                        'usuario' => $id_usuario
                    ]
                ]);  
            }

        } catch (RequestException $e) {
            $exception = (string) $e->getResponse()->getBody();
            $exception = json_decode($exception);
            return response()->json(['mesage' => $exception]);
        }
    }

    public function updateTorneo(Request $request,$id)
    {
        
        try {
            
            $response = $this->client->request('PUT', 'torneo/'.$id, [
                'form_params' => [
                    'nombre' => $request->datos[0]['nombre'],
                    'duracion_tiempo' => $request->datos[0]['duracion_tiempo'],
                    'sexo_jugadores' => $request->datos[0]['sexo_jugadores'],
                    'fecha_inicio' => $request->datos[0]['fecha_inicio'],
                    'fecha_final_temporada' => $request->datos[0]['fecha_final_temporada'],
                    'fecha_limite_pagos' => $request->datos[0]['fecha_limite_pagos'],
                    'costo_inscripcion' => $request->datos[0]['costo_inscripcion'],
                    'costo_albitraje' => $request->datos[0]['costo_albitraje'],
                    'notas' => $request->datos[0]['notas'],
                    'lunes' => $request->datos[0]['lunes'],
                    'martes' => $request->datos[0]['martes'],
                    'miercoles' => $request->datos[0]['miercoles'],
                    'jueves' => $request->datos[0]['jueves'],
                    'viernes' => $request->datos[0]['viernes'],
                    'sabado' => $request->datos[0]['sabado'],
                    'domingo' => $request->datos[0]['domingo'],
                    'categoria' => $request->datos[0]['categoria'],
                    'tipo_torneo' => $request->datos[0]['tipo_torneo'],
                    'modo_juego' => $request->datos[0]['modo_juego'],
                    'campeon' => $request->datos[0]['campeon'],
                    'equipos_clasifican_final' => $request->datos[0]['equipos_clasifican_final'],
                    'vueltas_torneo' => $request->datos[0]['vueltas_torneo'],
                    'vueltas_eliminacion' => $request->datos[0]['vueltas_eliminacion'],
                    'vueltas_final' => $request->datos[0]['vueltas_final'],
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
