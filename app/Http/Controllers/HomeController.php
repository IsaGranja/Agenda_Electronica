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
    //base
    public function baseFunc()
    {
        return view('base');
    }
    public function provinciasFunc()
    {
        return view('provincias');
    }
    public function ciudadesFunc()
    {
        return view('ciudades');
    }
    public function universidadesFunc()
    {
        return view('universidades');
    }
    public function sedesFunc()
    {
        return view('sedes');
    }    
    public function periodosFunc()
    {
        return view('periodos');
    }
    public function facultadesFunc()
    {
        return view('facultades');
    }
    public function facultadesxsedeFunc()
    {
        return view('facultadesxsede');
    }
    public function escuelasFunc()
    {
        return view('escuelas');
    }
    public function carrerasFunc()
    {
        return view('carreras');
    }
    public function estudiantesFunc()
    {
        return view('estudiantes');
    }
    public function estudiantesExcelFunc()
    {
        return view('estudiantesExcel');
    }
    public function profesoresFunc()
    {
        return view('profesores');
    }
    public function asignaturasxestudianteFunc()
    {
        return view('asignaturasxestudiante');
    }
    public function asignaturasxprofesorFunc()
    {
        return view('asignaturasxprofesor');
    }
    public function contenidosFunc()
    {
        return view('contenidos');
    }
    public function unidadesFunc()
    {
        return view('unidades');
    }
    public function temasFunc()
    {
        return view('temas');
    }
    public function talleresFunc()
    {
        return view('talleres');
    }
    public function evaluacionesFunc()
    {
        return view('evaluaciones');
    }
    public function glosariosFunc()
    {
        return view('glosarios');
    }
    public function anotacionesFunc()
    {
        return view('anotaciones');
    }
}
