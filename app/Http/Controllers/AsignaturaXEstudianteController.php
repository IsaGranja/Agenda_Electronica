<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AsignaturasxestudianteModel;
class AsignaturaXEstudianteController extends Controller
{
    
    public function create()
    {
        try{
        $periodos = DB::table('periodos')->select('*')->where('estperiodo','A')->get();
        $estudiantes = DB::table('estudiantes')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        $carreras = DB::table('carreras')->select('*')->get();
        $escuelas = DB::table('escuelas')->select('*')->get();
        $facultades = DB::table('facultades')->select('*')->get();
        $profesores = DB::table('profesores')->select('*')->get(); 
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return view('AsignaturasXEstudiante',compact('periodos','estudiantes',
        'asignaturas','carreras','profesores', 'escuelas', 'facultades'));
        
    }

    public function store(Request $request)
    {
        try{
        $periodos = $request->input('periodos');
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
                'codperiodo'=>$periodos[$counter],         
                'cedprofesor'=>$profesores[$counter]      
                ]);
            $counter++;
        }
    }catch(\Exception $e)
    {
        return back()->withError($e->getMessage());
    }   
        return redirect('pagAsigxEstu')->with('success', 'Se añadio correctamente');
    
}

    public function index()//consultar
    {
        try{

        $estudiantes = AsignaturasxestudianteModel::select('*')->get();
        //echo $asigxprofs;
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return view('indexAsigxestu',['estudiantes'=>$estudiantes]);
        
    }
    public function edit($cedestudiante)//abre la ventana para modificar
    {
        try{
        $periodos = DB::table('periodos')->select('*')->get();
        $estudiantes = DB::table('estudiantes')->select('*')->where('cedestudiante',$cedestudiante)->get();
        $estudiantes = json_decode($estudiantes,true)[0];

        $carreras = DB::table('carreras')->select('*')->where('codcarrera', $estudiantes['codcarrera'])->get();
        $carreras = json_decode($carreras,true)[0];

        $escuelas = DB::table('escuelas')->select('*')->where('codescuela', $carreras['codescuela'])->get();
        $escuelas = json_decode($escuelas,true)[0];

        $facultades = DB::table('facultades')->select('*')->where('codfacultad', $escuelas['codfacultad'])->get();
        $facultades = json_decode($facultades,true)[0];
        
        $asignaturas = DB::table('asignaturas')->select('*')->where('codcarrera', $estudiantes['codcarrera'])->get();
        
        $asignaturasxestudiantes = DB::table('asignaturasxestudiantes')->select('*')
        ->join('asignaturas', 'asignaturasxestudiantes.codasignatura', '=', 'asignaturas.codasignatura')
        ->join('profesores', 'asignaturasxestudiantes.cedprofesor', '=', 'profesores.cedprofesor')
        ->where('cedestudiante',$cedestudiante)
        ->get(); 

        $profesores = DB::table('profesores')->select('*')->where('codcarrera', $estudiantes['codcarrera'])->get(); 
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return view('EditAsigxestu',compact('periodos','estudiantes','asignaturasxestudiantes',
        'asignaturas','carreras','profesores', 'escuelas', 'facultades'));
    
    }
    public function update(Request $request)//modificar
    {   
        try{
        $periodos = $request->input('periodos');
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
                'codperiodo'=>$periodos[$counter],         
                'cedprofesor'=>$profesores[$counter]      
                ]);
            $counter++;
        }
    }catch(\Exception $e)
    {
        return back()->withError($e->getMessage());
    }   
        return redirect('pagAsigxEstu')->with('success', 'Se añadio correctamente');
    
        
    }
    public function destroy($cedestudiante)//modificar
    {   
        try{
        DB::table('asignaturasxestudiantes')->where('cedestudiante','=', $cedestudiante)->delete();
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return redirect('pagAsigxEstu')->with('success','Se elimino correctamente');
        
    }





}