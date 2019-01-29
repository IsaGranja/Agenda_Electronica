<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //homepage
    public function homeFunc()
    {
        return view('home');
    }
    //login
    public function loginFunc()
    {
        return view('login');
    }
    //musica
    public function audioFunc()
    {
        return view('audio');
    }
    //video
    public function videoFunc()
    {
        return view('video');
    }
    //imagen
    public function imagenFunc()
    {
        return view('imagen');
    }
}
