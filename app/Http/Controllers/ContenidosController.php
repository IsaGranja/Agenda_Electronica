<?php

namespace App\Http\Controllers;

use DB;
use App\ContenidosModel;
use Illuminate\Http\Request;

class ContenidosController extends Controller
{

    public function create()
    {
        try{
        $contenidos = DB::table('contenidos')->select('*')->get();
        $tema = DB::table('temas_estudio')->select('*')->get();
        $asignaturas = DB::table('asignaturas')->select('*')->get();
        //$carreras = DB::table('carreras')->select('*')->get();

        $contenidos = DB::table('contenidos')->select('*')->get();
        
            $carreras = DB::select('SELECT carreras.codcarrera, carreras.desccarrera, escuelas.descescuela, facultades.descfacultad, sedes.descsede, universidades.descuniversidad
                    FROM carreras natural join escuelas natural join facultades natural join facultadesxsedes natural join sedes natural join universidades;');
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
            return view('contenidosNuevo', compact('carreras', 'asignaturas', 'tema', 'contenidos'));
        
        
    }

    public function index()//consultar
    {
        try{
        $contenidos = ContenidosModel::select('*')->get();
        $temas = DB::table('temas_estudio')->select('*')->get();
        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return view('indexContenidos',['contenidos'=>$contenidos, 'tema'=> $temas]);
        
    }
    public function store(Request $request)
    {
        try{
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
        
            $this->validate($request, [
                'imagencontenido' => 'mimes:jpeg,jpg|image'
            ]);
            
           
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

    
                $textocontenido = $request->get('textocontenido');

                if(!$textocontenido)
                    $textocontenido = "";
        
                $infoapoyocontenido = $request->get('infoapoyo');
        
                if(!$infoapoyocontenido)
                    $infoapoyocontenido = "";

        $data = array('codcontenido' => $codcontenido, 'codtema' => $codtema, 'codasignatura' => $codasignatura,
            'textocontenido' => $textocontenido, 'imagencontenido' => $imagencontenido, 'videocontenido' => $videocontenido,
            'audiocontenido' => $audiocontenido, 'infoapoyocontenido' => $infoapoyocontenido);
        DB::table('contenidos')->insert($data);

        }catch(\Exception $e)
        {
            return back()->withError($e->getMessage());
        }
        return redirect('contenidos');
        
        
    }
    public function update(Request $request)
    {
       try{
        $codtema = $request->get('tema');
        $codasignatura = $request->get('codasignatura');
        $codcontenido = $request->get('codcontenido');
        $numero = substr($codcontenido, -1);
        
        $contenidos=DB::table('contenidos')->select('*')->where('codcontenido','=', $codcontenido)->get();
        $contenidos = json_decode($contenidos, true)[0];
        
        
            $this->validate($request, [
                'imagencontenido' => 'mimes:jpeg,jpg|image'
            ]);
            
             
           
        $imagencontenido = $contenidos['imagencontenido'];
        $audiocontenido = $contenidos['audiocontenido'];
        $videocontenido = $contenidos['videocontenido'];

        $codcontenido = $request->get('tema');
        $codcontenido = $codcontenido.'-C'. $numero;
                
        DB::table('contenidos')->where('codcontenido','=', $codcontenido)->delete();

        $audio = $request->file('audiocontenido');
        $video = $request->file('videocontenido');
        $image = $request->file('imagencontenido');
            


        if($image)
        {
            $imagencontenido = $codcontenido . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagencontenido);
        }
        
    
        if($audio)
        {
            $audiocontenido = $codcontenido . '.' . $audio->getClientOriginalExtension();
            $audio->move(public_path('audio'), $audiocontenido);
        }
        
        
        if($video)
        {
            $videocontenido = $codcontenido . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('video'), $videocontenido);
        }
        
            
        $textocontenido = $request->get('textocontenido');

                if(!$textocontenido)
                    $textocontenido = "";
        
                $infoapoyocontenido = $request->get('infoapoyo');
        
                if(!$infoapoyocontenido)
                    $infoapoyocontenido = "";

        $data = array('codcontenido' => $codcontenido, 'codtema' => $codtema, 'codasignatura' => $codasignatura,
            'textocontenido' => $textocontenido, 'imagencontenido' => $imagencontenido, 'videocontenido' => $videocontenido,
            'audiocontenido' => $audiocontenido, 'infoapoyocontenido' => $infoapoyocontenido);
        DB::table('contenidos')->insert($data);

    }catch(\Exception $e)
    {
        return back()->withError($e->getMessage());
    }  
        return redirect('contenidos');
    
        
    }
    public function edit($codcontenido)//abre la ventana para modificar
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
        return view('contenidosEdit',compact('carreras','contenidos',
        'asignaturas','tema'));
        
    }

    public function destroy($codcontenido)//modificar
    {   
        try{
        $contenido=DB::table('contenidos')->select('*')->where('codcontenido','=', $codcontenido)->get();
        $contenido = json_decode($contenido, true)[0];
        if($contenido['imagencontenido']!="")
        {
            $imagencontenido = "images/".$contenido['imagencontenido'];
            unlink($imagencontenido) or die("Couldn't delete file");
        }
        if($contenido['audiocontenido']!="")
        {
            $audiocontenido = "audio/".$contenido['audiocontenido'];
            unlink($audiocontenido) or die("Couldn't delete file");
        }
        if($contenido['videocontenido']!="")
        {
            $videocontenido = "video/".$contenido['videocontenido'];
            unlink($videocontenido) or die("Couldn't delete file");
        }

        DB::table('contenidos')->where('codcontenido','=', $codcontenido)->delete();
    }catch(\Exception $e)
    {
        return back()->withError($e->getMessage());
    }
        return redirect('contenidos')->with('success','Se elimino correctamente');
    
    }
}