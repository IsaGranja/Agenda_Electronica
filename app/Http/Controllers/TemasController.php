<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temas;
use DB;

class TemasController extends Controller
{
    public function index(){

        $test = DB::table('temas_estudio')
        ->join('asignaturas','asignaturas.codasignatura','=','temas_estudio.codasignatura')
        ->join('unidades_estudio','unidades_estudio.codunidad','=','temas_estudio.codunidad')
        ->join('carreras','carreras.codcarrera','=','asignaturas.codcarrera')
        ->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codtema')->paginate();


        return view('temas',compact('test'));
    }

    public function byAsignatura(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('asignaturas')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="">Seleccione una opción</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->descasignatura.'</option>';
        }
        echo $output;
    }

    public function byUnidad(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('unidades_estudio')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="">Seleccione una opción</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->codunidad.'">'.$row->numunidad.'</option>';
        }
        echo $output;
    }


    public function create(){

        $test = DB::table('carreras')->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codcarrera')->paginate();
        return view('temas_crear')->with('test', $test);
    }


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

    public function edit($codtema, $codunidad)
    {
           
        $test = DB::table('carreras')->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codcarrera')->paginate();

        $actual = DB::table('temas_estudio')
        ->join('asignaturas','asignaturas.codasignatura','=','temas_estudio.codasignatura')
        ->join('unidades_estudio','unidades_estudio.codunidad','=','temas_estudio.codunidad')
        ->join('carreras','carreras.codcarrera','=','asignaturas.codcarrera')
        ->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->where('codtema','=',$codtema)->first();


        $mas = DB::table('temas_estudio')->where('codunidad',$codunidad)->get();

        return view('temas_editar',compact('test','actual','mas'));
    }

    public function update(Request $request)
    {

        DB::table('temas_estudio')->where('codunidad',$request->codunidad)->delete();

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
        return redirect('pagTemas')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($codtema)
    {
        DB::table('temas_estudio')->where('codtema',$request->codtema)->delete();
        return back()->with(['message'=> 'Wrong ID!!']);
    }
}
