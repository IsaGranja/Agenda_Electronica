<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Provincia;

class ProvinciaController extends Controller
{
    public function index(){
        $provincias = Provincia::all();
        return view('provincias',compact('provincias')); 
       //return view('provincias');
    }
}
