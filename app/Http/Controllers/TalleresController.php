<?php

namespace App\Http\Controllers;

use DB;
use App\TalleresModel;
use Illuminate\Http\Request;

class TalleresController extends Controller
{

    public function create()
    {
        try{
        $tema = DB::table('temas_estudio')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        //$carreras = DB::table('carreras')->select('*')->get();

        $talleres = DB::table('talleres')->select('*')->get();
        
            $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
                    FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');
            
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return view('talleresNuevo', compact('carreras', 'asignaturas', 'tema', 'talleres'));
    }

    public function index()//consultar
    {
        try{
        $talleres = TalleresModel::select('*')->get();
        $tema = DB::table('temas_estudio')->select('*')->get();
        //echo $asigxprofs;
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return view('indexTalleres',['talleres'=>$talleres,'tema'=>$tema]);

    }
    public function store(Request $request)
    {
        try{
        $codtema = $request->get('tema');
        $codasignatura = $request->get('codasignatura');
        $codtaller = $request->get('codtaller');
        $numero = substr($codtaller, -2);
        if ($numero == null) {
            $numero = 1;
        } else {
            $numero += 1;
        }

        $codtaller = $request->get('tema');

        if($numero > 9)
            $codtaller = $codtaller .'-'. $numero;
        else
            $codtaller = $codtaller.'-0'.$numero;

            $taller = $request->file('archivotaller');
            $solucion = $request->file('archivosolucion');
            


            if($taller)
            {
                $archivotaller = $codtaller. '.' . $taller->getClientOriginalExtension();
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

        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return redirect('talleres');
        
        
    }
    public function update(Request $request)
    {
        try{
        $codtema = $request->get('tema');
        $codasignatura = $request->get('codasignatura');
        $codtaller = $request->get('codtaller');
        $numero = substr($codtaller, -2);
        
        $talleres=DB::table('talleres')->select('*')->where('codtaller','=', $codtaller)->get();
        $talleres = json_decode($talleres, true)[0];
        
        $archivotaller = $talleres['archivotaller'];
        $archivosolucion = $talleres['archivosolucion'];
        
        $codtaller = $request->get('tema');
        $codtaller = $codtaller .'-'. $numero;
                
        DB::table('talleres')->where('codtaller','=', $codtaller)->delete();

            $taller = $request->file('archivotaller');
            $solucion = $request->file('archivosolucion');
            


            if($taller)
            {
                $archivotaller = $codtaller. '.' . $taller->getClientOriginalExtension();
                $taller->move(public_path('taller'), $archivotaller);
            }
            
            if($solucion)
            {
                $archivosolucion = $codtaller . '-S.' . $solucion->getClientOriginalExtension();
                $solucion->move(public_path('soluciones'), $archivosolucion);
            }
            




        $data = array('codtaller' => $codtaller, 'codtema' => $codtema, 
        'archivotaller' => $archivotaller, 'archivosolucion'=>$archivosolucion);
        DB::table('talleres')->insert($data);
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return redirect('talleres');
        
        
    }
    public function edit($codtaller)//abre la ventana para modificar
    {
        try{
        $talleres = DB::table('talleres')->select('*')->where('codtaller',$codtaller)->get();
        $talleres = json_decode($talleres, true)[0];
        
        $tema = DB::table('temas_estudio')->select('*')->where('codtema', $talleres['codtema'])->get();
        $tema = json_decode($tema, true)[0];

        $asignaturas = DB::table('asignaturas')->select('*')->where('codasignatura', $tema['codasignatura'])->get();
        $asignaturas = json_decode($asignaturas, true)[0];


        $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
        FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');

        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return view('talleresEdit',compact('carreras','talleres',
        'asignaturas','tema'));
        
    }

    public function destroy($codtaller)//modificar
    {  
        try{ 
        $taller=DB::table('talleres')->select('*')->where('codtaller','=', $codtaller)->get();
        $taller = json_decode($taller, true)[0];
        if($taller['archivotaller']!="")
        {
            $archivotaller = "taller/".$taller['archivotaller'];
            unlink($archivotaller) or die("Couldn't delete file");
        }
        if($taller['archivosolucion']!="")
        {
            $archivosolucion = "soluciones/".$taller['archivosolucion'];
            unlink($archivosolucion) or die("Couldn't delete file");
        }

        DB::table('talleres')->where('codtaller','=', $codtaller)->delete();
    }catch(\Exception $e)
    {
        return back()->withError($e->getMessage());
    }
        return redirect('talleres')->with('success','Se elimino correctamente');
    
    }
    
}