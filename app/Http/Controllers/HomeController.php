<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\anotaciones;

class HomeController extends Controller
{
    /*
    public function index()
    {
        $periodos = DB::table('periodos')->where('periodos.estperiodo', '=', 'A')->get();
        return view('master',['periodos'=>$periodos]);
    }
    public function create()
    {
        $periodos = DB::table('periodos')->select('*')->where('estperiodo','A')->get();
        $estudiantes = DB::table('estudiantes')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        $carreras = DB::table('carreras')->select('*')->get();
        $profesores = DB::table('profesores')->select('*')->get(); 
        return view('AsignaturaXEstudiante',['periodos'=>$periodos,'estudiantes'=>$estudiantes,'asignaturas'=>$asignaturas,
         'carreras'=>$carreras, 'profesores'=>$profesores]);
    }*/
    public function index()//GET
	{
		return \App\anotaciones::all();
	}
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

}
