<?php

namespace App\Http\Controllers;

use DB;
use App\ContenidosModel;
use Illuminate\Http\Request;

class ContenidosController extends Controller
{

    public function create()
    {

        $contenido = DB::table('contenidos')->orderBy('codcontenido', 'desc')->first();
        $tema = DB::table('temas_estudio')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();

        if(empty($contenido)){
            $contenido='{
                "codcontenido": null,
                "textocontenido": "",
                "imagencontenido": null,
                "audiocontenido": null,
                "videocontenido": null  
            }';
            $contenido = json_decode($contenido);
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
            return view('contenidosNuevo', compact('datos', 'asignaturas', 'tema', 'contenido'));
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
            ->join('contenidos', 'temas_estudio.codtema', '=', 'contenidos.codtema')
            ->where('periodos.estperiodo', '=', 'A')
            ->get();
            //echo $contenido;
            return view('contenidos', compact('datos', 'asignaturas', 'tema', 'contenido'));
        }
    }

    public function index()//consultar
    {
        $contenidos = ContenidosModel::select('*')->get();
        //echo $asigxprofs;
        return view('indexContenidos',['contenidos'=>$contenidos]);
    }
    public function store(Request $request)
    {
        $codtema = $request->get('tema');
        $codasignatura = $request->get('asignatura');
        $codcontenido = $request->get('codcontenido');
        $numero = substr($codcontenido, -1);
        if ($numero == null) {
            $numero = 1;
        } else {
            $numero += 1;
        }
        $codcontenido = $request->get('tema');
        $codcontenido = $codcontenido . '-C' . $numero;
       // if ($request->hasFile('file')) {
            $this->validate($request, [
                'imagencontenido' => 'image',
            ]);
            
           /* $this->validate($request, [
                'audiocontenido'  => 'audio'
               ]);
            $this->validate($request, [
                'videocontenido'  => 'video'
               ]);*/
            
            $audio = $request->file('audiocontenido');
            $video = $request->file('videocontenido');
            $image = $request->file('imagencontenido');


            if($image)
            {
                $imagencontenido = $codcontenido . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imagencontenido);
            }
            else
                $imagencontenido = "";
            
            if($audio)
            {
                $audiocontenido = $codcontenido . '.' . $audio->getClientOriginalExtension();
                $audio->move(public_path('audio'), $audiocontenido);
            }
            else
                $audiocontenido = "";
            
            if($video)
            {
                $videocontenido = $codcontenido . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('video'), $videocontenido);
            }
            else
                $videocontenido = "";




        //}
        $textocontenido = $request->get('textocontenido');

        if(!$textocontenido)
            $textocontenido = "";

        $infoapoyocontenido = "";

        $data = array('codcontenido' => $codcontenido, 'codtema' => $codtema, 'codasignatura' => $codasignatura,
            'textocontenido' => $textocontenido, 'imagencontenido' => $imagencontenido, 'videocontenido' => $videocontenido,
            'audiocontenido' => $audiocontenido, 'infoapoyocontenido' => $infoapoyocontenido);
        DB::table('contenidos')->insert($data);

        $contenido = DB::table('contenidos')->orderBy('codcontenido', 'desc')->first();

            $datos = DB::table('escuelas')
            ->join('facultadesxsedes', 'escuelas.codfacultad', '=', 'facultadesxsedes.codfacultad')
            ->join('sedes', 'facultadesxsedes.codsede', '=', 'sedes.codsede')
            ->join('universidades', 'sedes.coduniversidad', '=', 'universidades.coduniversidad')
            ->join('carreras', 'escuelas.codescuela', '=', 'carreras.codescuela')
            ->join('asignaturas', 'carreras.codcarrera', '=', 'asignaturas.codcarrera')
            ->join('periodos', 'periodos.codsede', '=', 'sedes.codsede')
            ->join('temas_estudio', 'asignaturas.codasignatura', '=', 'temas_estudio.codasignatura')
            ->join('contenidos', 'temas_estudio.codtema', '=', 'contenidos.codtema')
            ->where('periodos.estperiodo', '=', 'A')
            ->get();
            //echo $contenido;
            $tema = DB::table('temas_estudio')->select('*')->get();
            $asignaturas = DB::table('asignaturas')->select('*')->get();
            return view('indexContenidos', compact('datos', 'asignaturas', 'tema', 'contenido'));
        
    }
    
    public function destroy($codcontenido)//modificar
    {   
        //$codtema = $request->get('tema');
        //echo $codtema;
        DB::table('contenidos')->where('codcontenido','=', $codcontenido)->delete();
        return redirect('contenidos')->with('success','Se elimino correctamente');
    }
}