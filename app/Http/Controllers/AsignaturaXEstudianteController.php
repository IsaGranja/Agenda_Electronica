<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AsignaturasxestudianteModel;
class AsignaturaXEstudianteController extends Controller
{
    
    public function create()
    {
        $periodos = DB::table('periodos')->select('*')->where('estperiodo','A')->get();
        $estudiantes = DB::table('estudiantes')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        $carreras = DB::table('carreras')->select('*')->get();
        $profesores = DB::table('profesores')->select('*')->get(); 
        return view('AsignaturaXEstudiante',['periodos'=>$periodos,'estudiantes'=>$estudiantes,'asignaturas'=>$asignaturas,
         'carreras'=>$carreras, 'profesores'=>$profesores]);
    }

    public function store(Request $request)
    {
        $codperiodo = $request->input('codperiodo');
        $cedestudiante = $request->input('cedestudiante');
       
        $asignaturas = $request->input('asignaturas');
        $profesores = $request->input('profesores');
        $counter = 0;
        foreach( $asignaturas as $asignatura){
            $asigs= DB::table('asignaturas')->select('codasignatura')->where('descasignatura','=',$asignatura)->get();
            $codasignatura;
            foreach ($asigs as $asig){
                $codasignatura = $asig->codasignatura;
            }
            
            DB::table('asignaturasxestudiantes')->insert([
                'codasignatura'=>$codasignatura,
                'cedestudiante'=>$cedestudiante,
                'codperiodo'=>$codperiodo,         
                'cedprofesor'=>$profesores[$counter]      
                ]);
            $counter++;
        }
       
        return redirect('pagAsigxEstu')->with('success', 'Se añadio correctamente');
        
    }

    public function index()//consultar
    {
        

        $estudiantes = AsignaturasxestudianteModel::select('*')->get();
        //echo $asigxprofs;
        return view('indexAsigxestu',['estudiantes'=>$estudiantes]);
    }
    public function edit($cedestudiante)//abre la ventana para modificar
    {
        $periodos = DB::table('periodos')->select('*')->where('estperiodo','1')->get();
        $estudiantes = DB::table('estudiantes')->select('*')->where('cedestudiante',$cedestudiante)->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        $asignaturasxestudiantes = DB::table('asignaturasxestudiantes')->select('*')
        ->join('asignaturas', 'asignaturasxestudiantes.codasignatura', '=', 'asignaturas.codasignatura')
        ->join('profesores', 'asignaturasxestudiantes.cedprofesor', '=', 'profesores.cedprofesor')
        ->where('cedestudiante',$cedestudiante)
        ->get(); 
        $carreras = DB::table('carreras')->select('*')->get();
        $profesores = DB::table('profesores')->select('*')->get(); 
        return view('EditAsigxestu',compact('periodos','estudiantes','asignaturasxestudiantes',
        'asignaturas','carreras','profesores'));
    }
    public function update(Request $request)//modificar
    {   
        
        $codperiodo = $request->input('codperiodo');
        $cedestudiante = $request->input('cedestudiante');
             
        $asignaturas = $request->input('asignaturas');


        DB::table('asignaturasxestudiantes')->where('cedestudiante','=', $cedestudiante)->delete();
        $profesores = $request->input('profesores');
        $counter = 0;
        foreach( $asignaturas as $asignatura){
            $asigs= DB::table('asignaturas')->select('codasignatura')->where('descasignatura','=',$asignatura)->get();
            $codasignatura;
            foreach ($asigs as $asig){
                $codasignatura = $asig->codasignatura;
            }
            
            DB::table('asignaturasxestudiantes')->insert([
                'codasignatura'=>$codasignatura,
                'cedestudiante'=>$cedestudiante,
                'codperiodo'=>$codperiodo,         
                'cedprofesor'=>$profesores[$counter]      
                ]);
            $counter++;
        }
       
        return redirect('pagAsigxEstu')->with('success', 'Se añadio correctamente');
        
    }
    public function destroy($cedestudiante)//modificar
    {   
        DB::table('asignaturasxestudiantes')->where('cedestudiante','=', $cedestudiante)->delete();
        return redirect('pagAsigxEstu')->with('success','Se elimino correctamente');
    }





}
