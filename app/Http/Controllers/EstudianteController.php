<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Estudiante;
use DB;
class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('cedula')!= ""){
            $estudiantes = DB::table('estudiantes')->join('carreras','carreras.codcarrera','=','estudiantes.codcarrera')->where('estudiantes.cedestudiante','LIKE','%'.$request->get('cedula').'%')->paginate(10);
            //dd($estudiantes);
            return view('estudiantes',compact('estudiantes'));
         }
         else{
            $estudiantes = DB::table('estudiantes')->join('carreras','carreras.codcarrera','=','estudiantes.codcarrera')->paginate(10);
            //dd($estudiantes);
            return view('estudiantes',compact('estudiantes'));
         }
    }

    public function create()
    {
       $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
                    FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');
                   // dd($carreras);
        return view('estudiantes_crear', compact('carreras'));
    }

    public function store(Request $request)
    {   $buscar = Estudiante::where('cedestudiante', $request->input('cedestudiante'))->first();
        if($buscar == null)
        {  
        $estudiante = new Estudiante();
        $estudiante->cedestudiante = $request->input('cedestudiante');
        $estudiante->codcarrera = $request->input('codcarrera');
        $estudiante->nomestudiante = $request->input('nomestudiante');
        $estudiante->apeestudiante = $request->input('apeestudiante');
        $estudiante->correestudiante = $request->input('correestudiante');
        $estudiante->save();
        
        return redirect('pagEstudiantes');
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
        $estudiante = Estudiante::where('cedestudiante', $id)->first();
      //  dd($estudiante);
        return view('estudiantes_editar', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->nomestudiante = $request->input('nomestudiante');
        $estudiante->apeestudiante = $request->input('apeestudiante');
        $estudiante->correestudiante = $request->input('correestudiante');
        $estudiante->save();

        return redirect()->action('EstudianteController@index', ['success' => 'Estudiante actualizado']);
    }

    public function destroy($id)
    {
        $asigxest = DB::table('asignaturasxestudiantes')->where('cedestudiante', '=', $id)->get();
       // dd($id);
        if($asigxest->count()==0)
        {
            $estudiante = Estudiante::find($id);
           // dd($estudiante);
            $estudiante->delete();
            return redirect()->action('EstudianteController@index', ['success' => 'Estudiante eliminado']);
        }
        else{
            return redirect()->action('EstudianteController@index', ['success' => 'Estudiante no se pudo eliminar']);
        }

    }
}
