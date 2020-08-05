<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TorneoController extends Controller
{
    public function show()
    {        
        return view('admin.torneo.show');
    }
}
