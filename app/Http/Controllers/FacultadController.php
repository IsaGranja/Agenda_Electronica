<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facultad;

class FacultadController extends Controller
{
    public function index()
    {
        $facus = Facultad::all()->sortBy('codfacultad');
        return view('facultades',compact('facus'));
    }
    public function create()
    {
        return view('facultades_crear');
    }
    public function store(Request $request)
    {
        Facultad::create([
            'codfacultad'=> $request->input('codfacultad'),
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

