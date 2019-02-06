<?php

namespace App\Http\Controllers;

use DB;
use App\TalleresModel;
use Illuminate\Http\Request;

class TalleresController extends Controller
{

    public function create()
    {

        $talleres = DB::table('talleres')->orderBy('codtaller', 'desc')->first();
        $tema = DB::table('temas_estudio')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        //$carreras = DB::table('carreras')->select('*')->get();


        if(empty($talleres)){
            $talleres='{
                "codtaller": null,
                "archivotaller": null,
                "archivosolucion": null
            }';
            $talleres = json_decode($talleres);
            $datos = DB::table('escuelas')
            ->join('facultadesxsedes', 'escuelas.codfacultad', '=', 'facultadesxsedes.codfacultad')
            ->join('sedes', 'facultadesxsedes.codsede', '=', 'sedes.codsede')
            ->join('universidades', 'sedes.coduniversidad', '=', 'universidades.coduniversidad')
            ->join('carreras', 'escuelas.codescuela', '=', 'carreras.codescuela')
            ->join('asignaturas', 'carreras.codcarrera', '=', 'asignaturas.codcarrera')
            ->join('periodos', 'periodos.codsede', '=', 'sedes.codsede')
            ->join('temas_estudio', 'asignaturas.codasignatura', '=', 'temas_estudio.codasignatura')
            ->where('periodos.estperiodo', '=', 'A')
            ->get();
            return view('talleresNuevo', compact('datos', 'asignaturas', 'tema', 'talleres'));
        }
        else{
            $datos = DB::table('escuelas')
            ->join('facultadesxsedes', 'escuelas.codfacultad', '=', 'facultadesxsedes.codfacultad')
            ->join('sedes', 'facultadesxsedes.codsede', '=', 'sedes.codsede')
            ->join('universidades', 'sedes.coduniversidad', '=', 'universidades.coduniversidad')
            ->join('carreras', 'escuelas.codescuela', '=', 'carreras.codescuela')
            ->join('asignaturas', 'carreras.codcarrera', '=', 'asignaturas.codcarrera')
            ->join('periodos', 'periodos.codsede', '=', 'sedes.codsede')
            ->join('temas_estudio', 'asignaturas.codasignatura', '=', 'temas_estudio.codasignatura')
            ->join('talleres', 'temas_estudio.codtema', '=', 'talleres.codtema')
            ->where('periodos.estperiodo', '=', 'A')
            ->get();
            //echo $contenido;
            return view('talleres', compact('datos', 'asignaturas', 'tema', 'talleres'));
        }
    }
    public function index()//consultar
    {
        $talleres = TalleresModel::select('*')->get();
        //echo $asigxprofs;
        return view('indexTalleres',['talleres'=>$talleres]);
    }
    public function store(Request $request)
    {
        $codtema = $request->get('tema');
        $codasignatura = $request->get('codasignatura');
        /*$codtaller = DB::table('talleres')->where('talleres.codtema', '=', $codtema)
        ->orderBy('codtaller', 'desc')->first();*/
        $codtaller = $request->get('codtaller');
        $numero = substr($codtaller, -1);
        if ($numero == null) {
            $numero = 1;
        } else {
            $numero += 1;
        }
        $codtaller = $request->get('tema');
        $codtaller = $codtaller .''. $numero;


            $taller = $request->file('archivotaller');
            $solucion = $request->file('archivosolucion');
            


            if($taller)
            {
                $archivotaller = $codtaller. '-.' . $taller->getClientOriginalExtension();
                $taller->move(public_path('taller'), $archivotaller);
            }
            else
                $archivotaller = "";
            
            if($solucion)
            {
                $archivosolucion = $codtaller . '-S.' . $solucion->getClientOriginalExtension();
                $solucion->move(public_path('soluciones'), $archivosolucion);
            }
            else
                $archivosolucion = "";




        $data = array('codtaller' => $codtaller, 'codtema' => $codtema, 
        'archivotaller' => $archivotaller, 'archivosolucion'=>$archivosolucion);
        DB::table('talleres')->insert($data);

        $talleres = DB::table('talleres')->orderBy('codtaller', 'desc')->first();

        $datos = DB::table('escuelas')
        ->join('facultadesxsedes', 'escuelas.codfacultad', '=', 'facultadesxsedes.codfacultad')
        ->join('sedes', 'facultadesxsedes.codsede', '=', 'sedes.codsede')
        ->join('universidades', 'sedes.coduniversidad', '=', 'universidades.coduniversidad')
        ->join('carreras', 'escuelas.codescuela', '=', 'carreras.codescuela')
        ->join('asignaturas', 'carreras.codcarrera', '=', 'asignaturas.codcarrera')
        ->join('periodos', 'periodos.codsede', '=', 'sedes.codsede')
        ->join('temas_estudio', 'asignaturas.codasignatura', '=', 'temas_estudio.codasignatura')
        ->join('talleres', 'temas_estudio.codtema', '=', 'talleres.codtema')
        ->where('periodos.estperiodo', '=', 'A')
        ->get();
        $tema = DB::table('temas_estudio')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        //echo $talleres;
        return view('indexTalleres', compact('datos', 'asignaturas', 'tema', 'talleres'));
        
    }
    public function destroy($codtaller)//modificar
    {   
        //$codtema = $request->get('tema');
        //echo $codtema;
        DB::table('talleres')->where('codtaller','=', $codtaller)->delete();
        return redirect('talleres')->with('success','Se elimino correctamente');
    }
    
}