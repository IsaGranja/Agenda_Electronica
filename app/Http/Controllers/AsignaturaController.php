<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AsignaturaModel;
class AsignaturaController extends Controller
{
    
    public function create()
    {
        try{
        $carreras = DB::table('carreras')->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','escuelas.codfacultad','=','facultades.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codcarrera')->paginate();
        }
        catch(\Exception $e)		{
			return back()->withError($e->getMessage());
		}
        return view('CreateAsignatura')->with('carreras', $carreras);
    }

    public function store(Request $request)
    {
        try{
            $desccarrera = $request->input('desccarrera');
            $codasignatura = $request->input('codasignatura');
            $descasignatura = $request->input('descasignatura');
            $credasignatura = $request->input('credasignatura');
            $nivelasignatura = $request->input('nivelasignatura');
            $objeasignatura = $request->input('objeasignatura');
            $resulapreasignatura = $request->input('resulapreasignatura');
            $caracapreasignatura = $request->input('caracapreasignatura');

            $carreras= DB::table('carreras')->select('codcarrera')->where('desccarrera','=',$desccarrera)->get();
            
            $codcarrera = $request->input('codcarrera');
            /*
            $codcarerra="";
            foreach ($carreras as $carrera){
                $codcarrera = $carrera->codcarrera;
                console.log($codcarrera);
            }*/

            $data = array('codcarrera'=>$codcarrera,
            'codasignatura'=>$codasignatura,
            'descasignatura'=>$descasignatura,
            'credasignatura'=>$credasignatura,
            'nivelasignatura'=>$nivelasignatura,
            'objeasignatura'=>$objeasignatura,
            'resulapreasignatura'=>$resulapreasignatura,
            'caracapreasignatura'=>$caracapreasignatura
        
            );
            DB::table('asignaturas')->insert($data);
        }
        catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
        return redirect('pagAsignaturas')->with('success', 'Se añadió correctamente');
    }

    public function index()
    {
        $carreras= DB::table('carreras')->select('codcarrera')->where('desccarrera','=',$desccarrera)->get();
        $asignaturas = AsignaturaModel::select('*')->get();
        return view('IndexAsignaturas',['asignaturas'=>$asignaturas]);
    }

    public function edit($codasignatura)//abre la ventana para modificar
    {
        $universidades = DB::table('universidades')->select('*')->get();
        $carreras = DB::table('carreras')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->where('codasignatura',$codasignatura)->get();
        
        $codcar;
        foreach ($asignaturas as $ass){
            $codcar = $ass->codcarrera;
        }

        $cars = DB::table('carreras')->select('*')->where('codcarrera',$codcar)->get();

         
        return view('EditAsignatura',compact('universidades','carreras','asignaturas','cars'));
    }

    public function update(Request $request)//modificar
    {   
        
        $desccarrera = $request->input('desccarrera');
        $codasignatura = $request->input('codasignatura');
        $descasignatura = $request->input('descasignatura');
        $credasignatura = $request->input('credasignatura');
        $nivelasignatura = $request->input('nivelasignatura');
        $objeasignatura = $request->input('objeasignatura');
        $resulapreasignatura = $request->input('resulapreasignatura');
        $caracapreasignatura = $request->input('caracapreasignatura');

        $carreras= DB::table('carreras')->select('codcarrera')->where('desccarrera','=',$desccarrera)->get();
        $codcarrera;
        foreach ($carreras as $carrera){
            $codcarrera = $carrera->codcarrera;
        }

        $data = array('codcarrera'=>$codcarrera,
        'codasignatura'=>$codasignatura,
        'descasignatura'=>$descasignatura,
        'credasignatura'=>$credasignatura,
        'nivelasignatura'=>$nivelasignatura,
        'objeasignatura'=>$objeasignatura,
        'resulapreasignatura'=>$resulapreasignatura,
        'caracapreasignatura'=>$caracapreasignatura
    
        );
        DB::table('asignaturas')->where('codasignatura','=', $codasignatura)->update($data);
       
        return redirect('pagAsignaturas')->with('success', 'Se modificó correctamente');
        
    }

    public function destroy($codasignatura)//modificar
    {   
        DB::table('asignaturas')->where('codasignatura','=', $codasignatura)->delete();
        return redirect('pagAsignaturas')->with('success','Se eliminó correctamente');
    }


}
