<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultadosController extends Controller
{
    public function index()
    {
        return view('resultados.index');
    }

    public function detalles_partido()
    {
        return view('resultados.detalles');
    }
}
