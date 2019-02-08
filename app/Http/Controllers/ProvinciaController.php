<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Provincia;

class ProvinciaController extends Controller
{
    public function index(){
        $provincias = Provincia::all()->sortBy('codprovincia');
        return view('provincias',compact('provincias')); 
       //return view('provincias');
    }

    public function create()
    {
        $ultimo = Provincia::all()->sortBy('codprovincia')->last();
        $codigo = $ultimo->codprovincia +1;
        return view('provincia_crear',compact('codigo'));
    }

    public function store(Request $request)
    {
        $ultimo = Provincia::all()->sortBy('codprovincia')->last();
        $codigo = $ultimo->codprovincia +1;
        Provincia::create([
            'codprovincia' => $codigo,
            'desprovincia'=> $request->input('desprovincia')
        ]);
        return redirect('pagProvincias');
    }

    public function edit($codprovincia)
    {
        $codigo = Provincia::where('codprovincia', $codprovincia)->first();
        return view('provincia_editar', compact('codigo'));
    }

    public function update(Request $request)
    {
        $data = array(
            'desprovincia'=>$request->input('desprovincia')
        );
        
        Provincia::where('codprovincia','=', $request->codprovincia)->update($data);
        return redirect('pagProvincias')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($codprovincia)
    {
        $codigo = Provincia::where('codprovincia', $codprovincia)->first();
        
        if ($codigo != null) {
            $codigo->delete();
            return back()->with(['message'=> 'Successfully deleted!!']);
        }
        return back()->with(['message'=> 'Wrong ID!!']);
    }
}
