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
        $codcontenido=Input::get('contenido');
        $palabraglosario= $request->input('palabraglosario');
        $defglosario= $request->input('defglosario');
        $codglosario =DB::table('glosarios')->select('codglosario')
        ->where('codcontenido',$codcontenido)
        ->orderby('codglosario','desc')
        ->first();
        $codglosario = (array)$codglosario;
        list($keys, $values) = array_divide($codglosario);
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
        try{
            $contenidos = DB::table('contenidos')->select('*')->where('codcontenido',$codcontenido)->get();
            $contenidos = json_decode($contenidos, true)[0];
            
            $tema = DB::table('temas_estudio')->select('*')->where('codtema', $contenidos['codtema'])->get();
            $tema = json_decode($tema, true)[0];

            $asignaturas = DB::table('asignaturas')->select('*')->where('codasignatura', $tema['codasignatura'])->get();
            $asignaturas = json_decode($asignaturas, true)[0];

            $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
            FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');

        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return view('glosariosEdit',compact('carreras','contenidos',
        'asignaturas','tema'));
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
        return redirect('glosarios')->with('success', 'Se modificó correctamente');
    }
    public function destroy($codglosario)
    {   
        try{
            DB::table('glosarios')->where('codglosario',$codglosario)->delete();
        
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
        
        return redirect('glosarios')->with('success','Se eliminó correctamente');
        

    }
}
