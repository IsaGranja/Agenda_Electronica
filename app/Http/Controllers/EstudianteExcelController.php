<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
class EstudianteExcelController extends Controller
{

    public function create()
    {
        try {
        $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
                    FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');
                   // dd($carreras);
        $datos = DB::table('escuelas')
        ->join('facultadesxsedes', 'escuelas.codfacultad', '=', 'facultadesxsedes.codfacultad')
        ->join('sedes', 'facultadesxsedes.codsede', '=', 'sedes.codsede')
        ->join('universidades', 'sedes.coduniversidad', '=', 'universidades.coduniversidad')
        ->join('carreras', 'escuelas.codescuela', '=', 'carreras.codescuela')
        ->join('asignaturas', 'carreras.codcarrera', '=', 'asignaturas.codcarrera')
        ->join('periodos', 'periodos.codsede', '=', 'sedes.codsede')
        ->where('periodos.estperiodo', '=', 'A')
        ->get();
        
        $asignaturas = DB::table('asignaturas')->get();
        $periodos = DB::table('periodos')->where('periodos.estperiodo', '=', 'A')->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('EstudiantesExcel',['periodos'=>$periodos,'datos'=>$datos,'carreras'=>$carreras,'asignaturas'=>$asignaturas]);
    }

    public function estudianteImport(Request $request)
    {
        try {
        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
               if (!empty($data) && $data->count())
               {
                   $cedprofesor = $request->get('cedprofesor');
                   $codperiodo = $request->get('codperiodo');
                   $codcarrera = $request->get('unies');

                   $codasignatura = $request->get('asignatura');
                   
                   
                   

                   foreach($data as $key => $value)
                   {
                    $cedestudiante = $value->cedula;
                    //$codcarrera = $request->get('codcarrera');
                    
                    $nomestudiante=$value->nombre;
                    $apeestudiante=$value->apellido;
                    $correestudiante  = $value->correo;                    
                    
                    $data2 = array('cedestudiante'=>$cedestudiante,'codcarrera'=>$codcarrera,'nomestudiante'=>$nomestudiante,'apeestudiante'=>$apeestudiante,'correestudiante'=>$correestudiante);
                    DB::table('estudiantes')->insert($data2);


                    $data3 = array('cedestudiante'=>$cedestudiante,'codasignatura'=>$codasignatura,'cedprofesor'=>$cedprofesor,'codperiodo'=>$codperiodo);
                    DB::table('asignaturasxestudiantes')->insert($data3);
                  
                    }

               }
                
        }
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return redirect('pagEstudiantes-excel/create')->with('success', 'Se añadio correctamente');
        
        
    }
    //
}
