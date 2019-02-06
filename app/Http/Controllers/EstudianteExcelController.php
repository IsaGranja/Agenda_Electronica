<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
class EstudianteExcelController extends Controller
{

    public function create()
    {
        $datos = DB::table('escuelas')
        ->join('facultadesxsedes', 'escuelas.codfacultad', '=', 'facultadesxsedes.codfacultad')
        ->join('sedes', 'facultadesxsedes.codsede', '=', 'sedes.codsede')
        ->join('universidades', 'sedes.coduniversidad', '=', 'universidades.coduniversidad')
        ->join('carreras', 'escuelas.codescuela', '=', 'carreras.codescuela')
        ->join('asignaturas', 'carreras.codcarrera', '=', 'asignaturas.codcarrera')
        ->join('periodos', 'periodos.codsede', '=', 'sedes.codsede')
        ->where('periodos.estperiodo', '=', 'A')
        ->get();

        $periodos = DB::table('periodos')->where('periodos.estperiodo', '=', 'A')->get();
        return view('EstudiantesExcel',['periodos'=>$periodos,'datos'=>$datos]);
    }

    public function estudianteImport(Request $request)
    {
        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
               if (!empty($data) && $data->count())
               {
                   $cedprofesor = $request->get('cedprofesor');
                   $codperiodo = $request->get('codperiodo');
                   $carreras= DB::table('profesores')->select('codcarrera')->where('cedprofesor','=',$cedprofesor)->get();
                   $codcarrera;
                   foreach ($carreras as $car){
                       $codcarrera = $car->codcarrera;
                   }

                   $descasignatura = $request->get('asignatura');
                   $asignaturas= DB::table('asignaturas')->select('codasignatura')->where('descasignatura','=',$descasignatura)->get();
                   $codasignatura;
                   foreach ($asignaturas as $asig){
                       $codasignatura = $asig->codasignatura;
                   }
                   

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
        return redirect('pagEstudiantes-excel/create')->with('success', 'Se añadio correctamente');
        
        
    }
    //
}
