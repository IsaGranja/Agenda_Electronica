<?php

namespace App\Http\Controllers;
use DB;
use App\Glosarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
        /*    public function store(Request $request)
    {
    public function store(Request $request)
    {
        $num = $request->input('numtema');
        $desc = $request->input('desctema');
        $coment = $request->input('comentema');
        for ($i=0; $i <count($num); $i++) { 
            $cad1 = $desc[$i];
            $cad2 = $coment[$i];
            Temas::create([
                'codasignatura'=>$request->input('codasignatura'),
                'codunidad'=>$request->input('codunidad'),
                'codtema'=>$request->input('codunidad')."-".strval($num[$i]),
                'desctema'=>$cad1,
                'numtema'=>intval($num[$i]),
                'comentema'=>$cad2,
                'esttema'=>'E'
            ]);
        }
       
        return redirect('pagTemas');
    }
        } */
        $codcontenido=Input::get('contenido');
        //$codcontenido= $request->input('codcontenido');
        //dd($codcontenido);
        $palabraglosario= $request->input('palabraglosario');
        $defglosario= $request->input('defglosario');
        $codglosario =DB::table('glosarios')->select('codglosario')
        ->where('codcontenido',$codcontenido)
        ->orderby('codglosario','desc')
        ->first();
        /*
        $codglosario = Glosarios::where('codcontenido',$codcontenido)
        ->orderby('codglosario','desc')
        ->first();*/
        $codglosario = (array)$codglosario;

        
        list($keys, $values) = array_divide($codglosario);
        //dd($values[0]);

        //$codglosario=response()->json($codglosario);
        //MyModel::where('field', 'foo')->first()->value('id');
        $numero = substr($values[0], -1);
        if ($numero == null) {
            $numero = 1;
        } else {
            $numero += 1;
        }

        for ($i=0; $i <count($palabraglosario); $i++) { 
            $palabraglosarioVal = $palabraglosario[$i];
            $defglosarioVal = $defglosario[$i];
            Glosarios::create([
                'codglosario'=>$codcontenido."-".(strval($numero+$i)),
                'codcontenido'=>$codcontenido,
                'palabraglosario'=>$palabraglosarioVal,
                'defglosario'=>$defglosarioVal
            ]);
        }
        return redirect('glosarios')->with('success', 'Se añadió correctamente');
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
        return redirect('glosarios')->with('success', 'Se modifico correctamente');
    }
    public function destroy($codglosario)//modificar
    {   
        DB::table('glosarios')->where('codglosario','=', $codglosario)->delete();
        return redirect('glosarios')->with('success','Se eliminó correctamente');
    }
}
