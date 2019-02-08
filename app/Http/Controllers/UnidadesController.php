<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Unidades;

class UnidadesController extends Controller
{
    public function index(){
       //$unidades = Unidades::all()->paginate(10);
       $unidades = DB::table('unidades_estudio')->join('asignaturas','asignaturas.codasignatura','=','unidades_estudio.codasignatura')
        ->join('carreras','carreras.codcarrera','=','asignaturas.codcarrera')
        ->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codunidad')->paginate();

        return view('unidades',compact('unidades'));
    
    }

    public function create(){
        $test = DB::table('carreras')->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codcarrera')->paginate();
        //return view('unidades',compact('test'));
        return view('unidades_crear')->with('test', $test);
    }


    public function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('asignaturas')
        ->where($select, $value)
        ->groupBy($dependent)
        ->get();
        $output = '<option value="">Select Asignatura</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->descasignatura.'</option>';
        }
        echo $output;
    }

    public function store(Request $request)
    {
        
        Unidades::create([
            'codasignatura'=>$request->input('codasignatura'),
            'codunidad'=>$request->input('codasignatura')."-".$request->input('numunidad'),
            'descunidad'=>$request->input('descunidad'),
            'numunidad'=>$request->input('numunidad')
        ]);
        return redirect('pagUnidades');
    }

    public function edit($codunidad)
    {
        $test = DB::table('carreras')->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codcarrera')->paginate();

        //$actual = Unidades::where('codunidad','=',$codunidad)->first();

        $univexcarrera = DB::table('unidades_estudio')->join('asignaturas','asignaturas.codasignatura','=','unidades_estudio.codasignatura')
        ->join('carreras','carreras.codcarrera','=','asignaturas.codcarrera')
        ->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->where('codunidad','=',$codunidad)->first();

        $asigxunidad= DB::table('unidades_estudio')
        ->join('asignaturas','asignaturas.codasignatura','=','unidades_estudio.codasignatura')
        ->where('codunidad','=',$codunidad)->first();

        return view('unidades_editar',compact('test','actual','univexcarrera','asigxunidad'));
        //return view('unidades_editar',compact('test','actual','univexcarrera','asigxunidad'));
    }

    public function update(Request $request)
    {
        $data = array(
            'codasignatura'=>$request->input('codasignatura'),
            'codunidad'=>$request->input('codasignatura')."-".$request->input('numunidad'),
            'descunidad'=>$request->input('descunidad'),
            'numunidad'=>$request->input('numunidad')
        );
        
        Unidades::where('codunidad','=', $request->codunidad)->update($data);
        return redirect('pagUnidades')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($codunidad)
    {
        $codigo = Unidades::where('codunidad', $codunidad)->first();
        
        if ($codigo != null) {
            $codigo->delete();
            return back()->with(['message'=> 'Successfully deleted!!']);
        }
        return back()->with(['message'=> 'Wrong ID!!']);
    }
}
