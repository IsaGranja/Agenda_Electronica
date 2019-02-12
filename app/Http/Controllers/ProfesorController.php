<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use DB;
class ProfesorController extends Controller
{
    public function index(Request $request)
    {
     // dd($request->get('cedula'));
     if($request->get('cedula')!= ""){
        $profesores = DB::table('profesores')->join('carreras','carreras.codcarrera','=','profesores.codcarrera')->where('profesores.cedprofesor','LIKE','%'.$request->get('cedula').'%')->paginate(10);
        //dd($profesores);
        return view('profesores',compact('profesores'));
     }
     else{
        $profesores = DB::table('profesores')->join('carreras','carreras.codcarrera','=','profesores.codcarrera')->paginate(10);
        //dd($profesores);
        return view('profesores',compact('profesores'));
     }
    }

    public function create()
    {
       $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
                    FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');
                    
       //$facultades = DB::select('SELECT facultades.codfacultad, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
       //FROM facultades natural join facultadesxsedes natural join sedes natural join universidades;');
                   // dd($carreras);
        //return view('escuelas_crear', compact('facultades'));

        return view('profesores_crear', compact('carreras'));
    }

    public function store(Request $request)
    {
        $buscar = Profesor::where('cedprofesor', $request->input('cedprofesor'))->first();
       // dd($buscar);
        if($buscar == null)
        {   
            $profesor = new Profesor();
            $profesor->cedprofesor = $request->input('cedprofesor');
            $profesor->codcarrera = $request->input('codcarrera');
            $profesor->nomprofesor = $request->input('nomprofesor');
            $profesor->apeprofesor = $request->input('apeprofesor');
            $profesor->correprofesor = $request->input('correprofesor');
            $profesor->celuprofesor = $request->input('celuprofesor');
            $profesor->save();
            return redirect('pagProfesores');
        }
        else{
            
            return redirect()->back() ->with(['error' => 'Ya existe esa cédula']);
        }
        
    }

    
    public function show($id)
    {
       
    }

    public function edit($id)
    {
        $profesor = Profesor::where('cedprofesor', $id)->first();
      //  dd($estudiante);
        return view('profesores_editar', compact('profesor'));
    }

    public function update(Request $request, $id)
    {
        $profesor = Profesor::find($id);
        $profesor->nomprofesor = $request->input('nomprofesor');
        $profesor->apeprofesor = $request->input('apeprofesor');
        $profesor->correprofesor = $request->input('correprofesor');
        $profesor->celuprofesor = $request->input('celuprofesor');
        $profesor->save();

        return redirect()->action('ProfesorController@index', ['success' => 'Estudiante actualizado']);
    }

    public function destroy($id)
    {
        $asigxest = DB::table('asignaturasxestudiantes')
        ->join('asignaturasxprofesor','asignaturasxestudiantes.cedprofesor','=','asignaturasxprofesor.cedprofesor')->where('asignaturasxprofesor.cedprofesor', '=', $id)->get();
        if($asigxest->count()==0)
        {
            $estudiante = Profesor::find($id);
            //dd($estudiante);
            $estudiante->delete();
            return redirect()->action('ProfesorController@index', ['success' => 'Profesor eliminado']);
        }
        else{
           
            return redirect()->back() ->with(['error' => 'No se puede eliminar el profesor. Está encargado de una asignatura']);
        }

    }
}
