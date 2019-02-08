<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AsignaturasxprofesorModel;
class AsignaturaXProfesorController extends Controller
{
    
    public function create()
    {
        $periodos = DB::table('periodos')->select('*')->where('estperiodo','1')->get();
        $profesores = DB::table('profesores')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        return view('AsignaturaXProfesor',['periodos'=>$periodos,'profesores'=>$profesores,'asignaturas'=>$asignaturas]);
    }

    public function store(Request $request)
    {
        $codperiodo = $request->input('codperiodo');
        $cedprofesor = $request->input('cedprofesor');
       
        $asignaturas = $request->input('asignaturas');

        foreach( $asignaturas as $asignatura){
            $asigs= DB::table('asignaturas')->select('codasignatura')->where('descasignatura','=',$asignatura)->get();
            $codasignatura;
            foreach ($asigs as $asig){
                $codasignatura = $asig->codasignatura;
            }

            DB::table('asignaturasxprofesor')->insert([
                'codasignatura'=>$codasignatura,
                'cedprofesor'=>$cedprofesor,
                'codperiodo'=>$codperiodo,               
                ]);
        }
       
        return redirect('pagAsigxProf')->with('success', 'Se añadio correctamente');
        
    }

    public function index()//consultar
    {
        

        $profesores = AsignaturasxprofesorModel::select('*')->get();
        //echo $asigxprofs;
        return view('indexAsigxprof',['profesores'=>$profesores]);
    }
    public function edit($cedprofesor)//abre la ventana para modificar
    {
        $periodos = DB::table('periodos')->select('*')->where('estperiodo','A')->get();
        $profesores = DB::table('profesores')->select('*')->where('cedprofesor',$cedprofesor)->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        $asignaturasxprofesor = DB::table('asignaturasxprofesor')->select('*')
        ->join('asignaturas', 'asignaturasxprofesor.codasignatura', '=', 'asignaturas.codasignatura')
        ->where('cedprofesor',$cedprofesor)
        
        ->get(); 
        return view('EditAsigxprof',compact('periodos','profesores','asignaturasxprofesor','asignaturas'));
    }
    public function update(Request $request)//modificar
    {   
        
        $codperiodo = $request->input('codperiodo');
        $cedprofesor = $request->input('cedprofesor');
             
        $asignaturas = $request->input('asignaturas');


        DB::table('asignaturasxprofesor')->where('cedprofesor','=', $cedprofesor)->delete();
        foreach( $asignaturas as $asignatura){
            $asigs= DB::table('asignaturas')->select('codasignatura')->where('descasignatura','=',$asignatura)->get();
            $codasignatura;
            foreach ($asigs as $asig){
                $codasignatura = $asig->codasignatura;
            }

            DB::table('asignaturasxprofesor')->insert([
                'codasignatura'=>$codasignatura,
                'cedprofesor'=>$cedprofesor,
                'codperiodo'=>$codperiodo,               
                ]);
        }
       
        return redirect('pagAsigxProf')->with('success', 'Se modifico correctamente');
        
    }
    public function destroy($cedprof)//modificar
    {   
        DB::table('asignaturasxprofesor')->where('cedprofesor','=', $cedprofesor)->delete();
        return redirect('pagAsigxProf')->with('success','Se elimino correctamente');
    }





}
