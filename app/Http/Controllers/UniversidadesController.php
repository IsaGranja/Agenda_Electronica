<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Universidades;

class UniversidadesController extends Controller
{
    public function index()
    {
        $universidades = Universidades::all();
        return view('universidades',compact('universidades')); 
    }
    public function create()
    {
        return view('universidades_crear'); 


    }
    public function store(Request $request)
    {
        $ultimo = Universidades::all()->sortBy('coduniversidad')->last();
        $codigo = 'UNI-'.strval($ultimo->coduniversidad+1);//substr($ultimo->coduniversidad,0,4);
        /*$test = $ultimo->coduniversidad;
       /* if ($numero < 10)
        {
            $codigo = 'UNI-0' + $numero;
        }
        else
            $codigo = 'UNI-' + $numero;*/
            Universidades::create([ 
            'coduniversidad'=>$codigo,
            'descuniversidad'=>$request->input('descuniversidad'),
            'categuniversidad'=>$request->input('categuniversidad'),
            'dir1universidad'=>$request->input('dir1universidad'),
            'dir2universidad'=>$request->input('dir2universidad'),
            'numdiruniversidad'=>$request->input('numdiruniversidad'),
            'tipouniversidad'=>$request->input('tipouniversidad'),
            'rectuniversidad'=>$request->input('rectuniversidad'),
            'viserecuniversidad'=>$request->input('viserecuniversidad'),
            'secregenuniversidad'=>$request->input('secregenuniversidad'),
            'rucuniversidad'=>$request->input('rucuniversidad')

        ]);
        return redirect('pagUniversidades');


    }
    
}
