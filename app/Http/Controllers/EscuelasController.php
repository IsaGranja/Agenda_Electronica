<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Escuelas;

class EscuelasController extends Controller
{
    public function index()
    {
        $escuelas = DB::table('escuelas')
        ->join('facultades','facultades.codfacultad','=','escuelas.codfacultad')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('codescuela')->get();
        return view('escuelas',compact('escuelas'));
    }

    public function create()
    {
        $facultades = DB::table('facultades')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->get();
        

        return view('escuelas_crear', compact('facultades'));
    }

    public function store(Request $request)
    {
        $ultimo = Escuelas::all()->sortBy('codescuela')->last();
        $codig = $ultimo->codescuela;
        $splitname=explode('-',$codig);
        $num=(int) $splitname[1];
        $num++;
        if($num <10 )
            $codigo = $splitname[0].'-0'.$num;        
        else
            $codigo = $splitname[0].'-'.$num;
        
        Escuelas::create([
            'codfacultad'=>$request->input('codfacultad'),
            'codescuela'=> $codigo,
            'descescuela'=> $request->input('descescuela'),
            'directorescuela'=> $request->input('directorescuela'),
         ]);

        return redirect("pagEscuelas");
        
    }

    public function edit($id)
    {    
        $edi=Escuelas::where('codescuela',$id)->first();

        $facultades = DB::table('facultades')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->get();

        return view('escuelas_editar',compact('edi','facultades'));
    }

    public function update(Request $request, $id)
    {
        $data=array(
            'codfacultad'=>$request->input('codfacultad'),
            'descescuela'=> $request->input('descescuela'),
            'directorescuela'=> $request->input('directorescuela') );          
  
        Escuelas::where('codescuela','=',$request->codescuela)->update($data);        
        return redirect("pagEscuelas");
    }

    public function destroy($id)
    {        
        $codEli=Escuelas::where('codescuela',$id)->first();
        
        if($codEli!=null)
        {
            $codEli->delete();
        }

        return back();
    }
}
