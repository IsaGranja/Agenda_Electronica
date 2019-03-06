<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AsignaturaModel;
class AsignaturaController extends Controller
{
    
    public function create()
    {
        try {
        $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
        FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');
       // dd($carreras);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('CreateAsignatura',['carreras'=>$carreras]);
    }

    public function store(Request $request)
    {
        try {
        $codasignatura = $request->input('codasignatura');
        $descasignatura = $request->input('descasignatura');
        $credasignatura = $request->input('credasignatura');
        $nivelasignatura = $request->input('nivelasignatura');
        $objeasignatura = $request->input('objeasignatura');
        $resulapreasignatura = $request->input('resulapreasignatura');
        $caracapreasignatura = $request->input('caracapreasignatura');

        
        $codcarrera= $request->input('unies');
        

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
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }

        
        return redirect('pagAsignaturas')->with('success', 'Se añadio correctamente');
        
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
        try {
        $asignaturas = AsignaturaModel::select('*')->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('IndexAsignaturas',['asignaturas'=>$asignaturas]);
    }

    public function edit($codasignatura)//abre la ventana para modificar
    {
        try {
        $asignaturas = DB::table('asignaturas')->select('*')->where('codasignatura',$codasignatura)->get();
        $codcarrera;
            foreach ($asignaturas as $asig){
                $codcarrera = $asig->codcarrera;
            }
        $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
        FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');
       // dd($carreras);

       $cars = DB::select("SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
        FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades where carreras.codcarrera = '".$codcarrera."';");
       // dd($carreras);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return view('EditAsignatura',compact('carreras','asignaturas','cars'));
    }

    public function update(Request $request)//modificar
    {   
        try {
        $codasignatura = $request->input('codasignatura');
        $descasignatura = $request->input('descasignatura');
        $credasignatura = $request->input('credasignatura');
        $nivelasignatura = $request->input('nivelasignatura');
        $objeasignatura = $request->input('objeasignatura');
        $resulapreasignatura = $request->input('resulapreasignatura');
        $caracapreasignatura = $request->input('caracapreasignatura');
        $codcarrera= $request->input('unies');

        $data = array('codcarrera'=>$codcarrera,
        'codasignatura'=>$codasignatura,
        'descasignatura'=>$descasignatura,
        'credasignatura'=>$credasignatura,
        'nivelasignatura'=>$nivelasignatura,
        'objeasignatura'=>$objeasignatura,
        'resulapreasignatura'=>$resulapreasignatura,
        'caracapreasignatura'=>$caracapreasignatura);

        DB::table('asignaturas')->where('codasignatura','=', $codasignatura)->update($data);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return redirect('pagAsignaturas')->with('success', 'Se modifico correctamente');
        
    }

    public function destroy($codasignatura)//modificar
    {   
        try {
        DB::table('asignaturas')->where('codasignatura','=', $codasignatura)->delete();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
        return redirect('pagAsignaturas')->with('success','Se elimino correctamente');
    }


}
