<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sedes;
use DB;

class SedesController extends Controller
{
    public function index()
    {
        $sedes = DB::table('sedes')
                    ->join('ciudades','ciudades.codciudad','=','sedes.codciudad')
                    ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
                    ->orderBy('codsede')
                    ->get();
        
        return view('sedes',compact('sedes')); 
    }
    public function create()
    {
        $universidad = DB::table('universidades')->get();
        $ciudad = DB::table('ciudades')->get();
        return view('sedes_crear',compact('universidad','ciudad'));



    }
    public function store(Request $request)
    {
        $ultimo = Sedes::all()->sortBy('codsede')->last();
        $cod = substr($ultimo->codsede,4,6);
        if(intval($cod)<10)
        {
            $cod1 = substr($ultimo->codsede,0,5);
            $cod2 = substr($ultimo->codsede,5,6);
            $codfin = $cod1.strval(intval($cod2)+1);

        }
        else
        {
            $cod1 = substr($ultimo->codsede,0,4);
            $cod2 = substr($ultimo->codsede,4,6);
            $codfin = $cod1.strval(intval($cod2)+1);
        }
        
        
            sedes::create([ 
            'coduniversidad'=>$request->input('coduniversidad'),
            'codciudad'=>$request->input('codciudad'),
            'codsede'=>$codfin,
            'descsede'=>$request->input('descsede'),
            'prerectsede'=>$request->input('prerectsede'),
            'secregensede'=>$request->input('secregensede'),
            

        ]);
        return redirect('pagSedes');


    }
    public function destroy($codsede)
    {
        $codigo = sedes::where('codsede', $codsede)->first();
        
        if ($codigo != null) {
            $codigo->delete();
            return back()->with(['message'=> 'Successfully deleted!!']);
        }
        return back()->with(['message'=> 'Wrong ID!!']);
    }
    public function edit($id)
    {
        //$codigo = sedes::where('codsede', $id)->first();
        $codigo = DB::table('sedes')
                    ->join('ciudades','ciudades.codciudad','=','sedes.codciudad')
                    ->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
                    ->where('codsede', $id)->first();
        $universidad = DB::table('universidades')->get();
        $ciudad = DB::table('ciudades')->get();
        return view('sedes_editar', compact('codigo','universidad','ciudad'));
        
    }

    public function update(Request $request, $id)
    {
        $codigo = sedes::find($id);
        $codigo->coduniversidad = $request->input('coduniversidad');
        $codigo->codciudad = $request->input('codciudad');
        $codigo->descsede = $request->input('descsede');
        $codigo->prerectsede = $request->input('prerectsede');
        $codigo->secregensede = $request->input('secregensede');
        $codigo->save();

        return redirect()->action('SedesController@index', ['success' => 'Sede actualizada']);
    }
}
