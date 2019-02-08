<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UnidadesController extends Controller
{
    public function index(){
        $test = DB::table('carreras')->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
                    ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
                    ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
                    ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
                    ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
                    ->orderBy('codcarrera')->paginate();
        return view('unidades',compact('test'));

    }

    public function byAsignatura($id){
        return DB::table("asignaturas")->where('codcarrera','=',$id)->get();
    }
}
