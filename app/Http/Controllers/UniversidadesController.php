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
        //$cod1 = substr($ultimo->coduniversidad,0,4);
        $cod = substr($ultimo->coduniversidad,4,6);
        //$codfin = $cod1.strval(intval($cod2)+01);
        if(intval($cod)<10)
        {
            $cod1 = substr($ultimo->coduniversidad,0,5);
            $cod2 = substr($ultimo->coduniversidad,5,6);
            $codfin = $cod1.strval(intval($cod2)+1);

        }
        else
        {
            $cod1 = substr($ultimo->coduniversidad,0,4);
            $cod2 = substr($ultimo->coduniversidad,4,6);
            $codfin = $cod1.strval(intval($cod2)+1);
        }
        
        
            Universidades::create([ 
            'coduniversidad'=>$codfin,
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
    public function destroy($coduniversidad)
    {
        $codigo = universidades::where('coduniversidad', $coduniversidad)->first();
        
        if ($codigo != null) {
            $codigo->delete();
            return back()->with(['message'=> 'Successfully deleted!!']);
        }
        return back()->with(['message'=> 'Wrong ID!!']);
    }
    public function edit($id)
    {
        $codigo = universidades::where('coduniversidad', $id)->first();
        return view('universidades_editar', compact('codigo'));
    }

    public function update(Request $request, $id)
    {
        $codigo = universidades::find($id);
        $codigo->descuniversidad = $request->input('descuniversidad');
        $codigo->categuniversidad = $request->input('categuniversidad');
        $codigo->dir1universidad = $request->input('dir1universidad');
        $codigo->dir2universidad = $request->input('dir2universidad');
        $codigo->numdiruniversidad = $request->input('numdiruniversidad');
        $codigo->tipouniversidad = $request->input('tipouniversidad');
        $codigo->rectuniversidad = $request->input('rectuniversidad');
        $codigo->viserecuniversidad = $request->input('viserecuniversidad');
        $codigo->secregenuniversidad = $request->input('secregenuniversidad');
        $codigo->rucuniversidad = $request->input('rucuniversidad');
        $codigo->save();

        return redirect()->action('UniversidadesController@index', ['success' => 'Universidad actualizada']);
    }
    
}
