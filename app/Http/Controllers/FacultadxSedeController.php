<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacultadxSede;
use DB;

class FacultadxSedeController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('sedebuscar')!= ""){
            $facus = DB::table('facultades')
            ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
            ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
            ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
            ->where('sedes.descsede','LIKE','%'.$request->get('sedebuscar').'%')
            ->paginate(10);
         }
         else{
            $facus = DB::table('facultades')
            ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
            ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
            ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
            ->paginate(10);
         }

        /*$facus = DB::table('facultades')
        ->join('facultadesxsedes','facultadesxsedes.codfacultad','=','facultades.codfacultad')
        ->join('sedes','sedes.codsede','=','facultadesxsedes.codsede')
        ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
        ->orderBy('descuniversidad')->get();*/

        return view('facultadesxsede',compact('facus'));
    }

    public function create()
    {
        $unis = DB::table('universidades')->get();
        $sedes = DB::table('sedes')->get();
        $facus= DB::table('facultades')->get();
        

        return view('facultadesxsede_crear', compact('unis','sedes','facus'));
    }

    public function store(Request $request)
    {
        $facultadxsede = new FacultadxSede();
        $facultadxsede->codsede = $request->input('sede');
        $facultadxsede->codfacultad = $request->input('facultad');
        $facultadxsede->save();
        $request->flash('alert-success', 'facultad por sede fue ingresado'); 
        return redirect('pagFacultadesxSede');
        
    }

    public function edit($id)
    {        
        $unis = DB::table('universidades')->get();
        $sedes = DB::table('sedes')->get();
        $facus= DB::table('facultades')->get();
        $edi=FacultadxSede::where('codfacultad',$id)->first();
        return view('facultadesxsede_editar',compact('edi','unis','sedes','facus'));
    }

    public function update(Request $request, $id)
    {
        $data=array(
            'codsede'=>$request->input('sede'),
            'codfacultad'=>$request->input('facultad'));
          
  
          FacultadxSede::where('codfacultad','=',$request->codfacultad)->update($data);        
          return redirect("pagFacultadesxSede");
    }

    public function destroy($id)
    {        
        $codEli=FacultadxSede::where('codfacultad',$id)->first();
        
        if($codEli!=null)
        {
            $codEli->delete();
        }

        return back();
    }
}
