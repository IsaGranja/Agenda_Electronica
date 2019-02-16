<?php

namespace App\Http\Controllers;
use DB;
use App\Glosarios;
use Illuminate\Http\Request;
class GlosariosController extends Controller
{
    public function create(){
        try{
            $tema = DB::table('temas_estudio')->select('*')->get();
            $asignaturas = DB::table('asignaturas')->select('*')->get();
            $contenido = DB::table('contenidos')->select('*')->get();
            $glosarios = DB::table('glosarios')->select('*')->get();
            $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
                        FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');
                
            }catch(\Exception $e)
            {
                return back()->withError($e->getMessage());
            }
            return view('glosarios', compact('carreras', 'asignaturas', 'tema', 'contenido', 'glosarios'));
    }
    public function store(Request $request){
        
        $codcontenido= $request->input('codperiodo');
        $cedprofesor = $request->input('cedprofesor');
        $asignaturas = $request->input('asignaturas');
        foreach( $glosario as $glosario){
            $asigs= DB::table('asignaturas')->select('codasignatura')->where('descasignatura','=',$asignatura)->get();
            $codasignatura;
            foreach ($asigs as $asig){
                $codasignatura = $asig->codasignatura;
            }
            DB::table('glosarios')->insert([
                'codglosario'=>$codglosario,
                'codcontenido'=>$codcontenido,
                'palabraglosario'=>$palabraglosario,
                'defglosario'=>$defglosario             
            ]);
        }
        return redirect('pagGlosarios')->with('success', 'Se añadió correctamente');
    }
    public function index()//consultar
    {
        $glosarios = Glosarios::select('*')->get();
        //echo $asigxprofs;
        return view('indexGlosarios',['glosarios'=>$glosarios]);
    }
    public function edit($codglosario)//abre la ventana para modificar
    {
        $periodos = DB::table('periodos')->select('*')->where('estperiodo','A')->get();
        $profesores = DB::table('profesores')->select('*')->where('cedprofesor',$cedprofesor)->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        $glosarios = DB::table('glosarios')->select('*')
        ->join('asignaturas', 'glosarios.codasignatura', '=', 'asignaturas.codasignatura')
        ->where('cedprofesor',$cedprofesor)
        
        ->get(); 
        return view('EditGlosarios',compact('periodos','profesores','glosarios','asignaturas'));
    }
    public function update(Request $request)//modificar
    {   
        $codperiodo = $request->input('codperiodo');
        $cedprofesor = $request->input('cedprofesor');    
        $asignaturas = $request->input('asignaturas');
        DB::table('glosarios')->where('cedprofesor','=', $cedprofesor)->delete();
        foreach( $asignaturas as $asignatura){
            $asigs= DB::table('asignaturas')->select('codasignatura')->where('descasignatura','=',$asignatura)->get();
            $codasignatura;
            foreach ($asigs as $asig){
                $codasignatura = $asig->codasignatura;
            }
            DB::table('glosarios')->insert([
                'codasignatura'=>$codasignatura,
                'cedprofesor'=>$cedprofesor,
                'codperiodo'=>$codperiodo,               
                ]);
        }
        return redirect('pagGlosarios')->with('success', 'Se modifico correctamente');
    }
    public function destroy($codglosario)//modificar
    {   
        DB::table('glosarios')->where('codglosario','=', $codglosario)->delete();
        return redirect('pagGlosarios')->with('success','Se eliminó correctamente');
    }
}
