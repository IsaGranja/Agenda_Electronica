<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras;
use DB;

class CarrerasController extends Controller
{
    public function index()
    {
        $carreras = DB::table('carreras')
        ->join('escuelas','escuelas.codescuela','=','carreras.codescuela')
        ->join('facultades','facultades.codfacultad','=','escuelas.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codcarrera')->get(); 
  
        return view('carreras',compact('carreras'));
        
    }
    public function create()
    {
        $carreras = DB::table('escuelas')
        ->join('facultades','facultades.codfacultad','=','escuelas.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('descuniversidad')->get(); 
        
        return view('carreras_crear', compact('carreras'));
    }
    public function store(Request $request)
    {        
        $ultimo = Carreras::all()->sortBy('codcarrera')->last();
        $codig = $ultimo->codcarrera;
        $splitname=explode('-',$codig);
        $num=(int) $splitname[1];
        $num++;
        if($num <10 )
            $codigo = $splitname[0].'-0'.$num;        
        else
            $codigo = $splitname[0].'-'.$num;
        
        Carreras::create([
            'codescuela'=>$request->input('codescuela'),
            'codcarrera'=> $codigo,
            'desccarrera'=> $request->input('desccarrera'),
            'nivcarrera'=> $request->input('Nniveles'),
            'direccarrera'=> $request->input('directorCarrera')
         ]);

        return redirect("pagCarreras");
    }
    public function edit($id)
    {
        $edi=Carreras::where('codcarrera',$id)->first();
        $carreras = DB::table('escuelas')
        ->join('facultades','facultades.codfacultad','=','escuelas.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('descuniversidad')->get(); 

        return view('carreras_editar',compact('edi','carreras'));
    }
    public function update(Request $request)
    {
        $data=array(
            'codescuela'=>$request->input('codescuela'),
            'desccarrera'=> $request->input('desccarrera'),
            'nivcarrera'=> $request->input('nivcarrera'),
            'direccarrera'=> $request->input('direccarrera')
        );

        Carreras::where('codcarrera','=',$request->codcarrera)->update($data);        
        return redirect("pagCarreras");
    }
    public function destroy($id)
    {
        $codEli=Carreras::where('codcarrera',$id)->first();
        
        if($codEli!=null)
        {
            $codEli->delete();
        }

        return back();
    }
}
