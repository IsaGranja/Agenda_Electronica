<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultad;
use DB;

class FacultadController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('buscardesc')!= ""){
            $facus = DB::table('facultades')
            ->where('facultades.descfacultad','LIKE','%'.$request->get('buscardesc').'%')
            ->paginate(10);            
        }
        else{
            $facus = Facultad::all()->sortBy('descfacultad');
        }        

        //$facus = Facultad::all()->sortBy('descfacultad');
        return view('facultades',compact('facus'));
        
    }
    public function create()
    {
        $facultades = DB::table('facultades')->orderBy('descfacultad','asc')->get();;
        $ultimo = Facultad::all()->sortBy('codfacultad')->last();
        $codig = $ultimo->codfacultad;        
        $splitname = explode('-',$codig);
        $num = (int) $splitname[1];
        $num++;
        if($num <10 ){
            $codigo = $splitname[0].'-0'.$num;
        }
        else
            $codigo = $splitname[0].'-'.$num;

        return view('facultades_crear', compact('codigo','facultades'));
    }
    public function store(Request $request)
    {        
        $ultimo = Facultad::all()->sortBy('codfacultad')->last();
        $codig = $ultimo->codfacultad;
        $splitname=explode('-',$codig);
        $num=(int) $splitname[1];
        $num++;
        if($num <10 )
            $codigo = $splitname[0].'-0'.$num;        
        else
            $codigo = $splitname[0].'-'.$num;
        
        Facultad::create([
            'codfacultad'=>$codigo,
            'descfacultad'=> $request->input('descfacultad'),
            'decafacultad'=> $request->input('decafacultad'),
            'subdecfacultad'=> $request->input('subdecfacultad'),
            'secreabogfacultad'=> $request->input('secreabogfacultad')
         ]);

        return redirect("pagFacultades");
    }
    public function edit($id)
    {
        $edi=Facultad::where('codfacultad',$id)->first();
        return view('facultades_editar',compact('edi'));
    }
    public function update(Request $request)
    {
        $data=array(
          'descfacultad'=>$request->input('descfacultad'),
          'decafacultad'=>$request->input('decafacultad'),
          'subdecfacultad'=>$request->input('subdecfacultad'),
          'secreabogfacultad'=>$request->input('secreabogfacultad')
        );

        Facultad::where('codfacultad','=',$request->codfacultad)->update($data);        
        return redirect("pagFacultades");
    }
    public function destroy($id)
    {
        $codEli=Facultad::where('codfacultad',$id)->first();
        
        if($codEli!=null)
        {
            $codEli->delete();
        }

        return back();
    }
}

