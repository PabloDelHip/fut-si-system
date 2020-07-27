<?php

namespace App\Http\Controllers;
use Cookie;
use Firebase\JWT\JWT;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function instalaciones()
    {
        return view('admin.instalaciones.ver');
    }
    
    public function altaInstalaciones()
    {
        return view('admin.instalaciones.alta');
    }
}
