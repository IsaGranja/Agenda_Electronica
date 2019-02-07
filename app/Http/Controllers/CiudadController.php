<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ciudad;
use DB;
class CiudadController extends Controller
{
    public function index(Request $request){
        //dd($request->get('ciudad'));
        if($request->get('ciudad')!= ""){
            $ciudades =Ciudad::where('descciudad','LIKE','%'.$request->get('ciudad').'%' )->paginate();
            //dd($profesores);
            return view('ciudades',compact('ciudades'));
         }
         else{
            $ciudades = Ciudad::paginate();
            return view('ciudades',compact('ciudades'));
         }
    }

    public function create()
    {
        $provincias = DB:: table('provincias')->orderBy('desprovincia', 'asc')->get();;
        $ultimo = Ciudad::all()->sortBy('codciudad')->last();
        $codig = $ultimo->codciudad ;
        $splitname = explode('-',$codig);
        //dd($splitname);
        $num = (int) $splitname[1];
        $num++;
        if($num <10 ){
            $codigo = $splitname[0].'-0'.$num;
        }
        else
            $codigo = $splitname[0].'-'.$num;
        return view('ciudades_crear',compact('codigo','provincias'));
    }

    public function store(Request $request)
    {
        $ultimo = Ciudad::all()->sortBy('codciudad')->last();
        $codig = $ultimo->codciudad ;
        $splitname = explode('-',$codig);
        //dd($splitname);
        $num = (int) $splitname[1];
        $num++;
        if($num <10 ){
            $codigo = $splitname[0].'-0'.$num;
        }
        else
            $codigo = $splitname[0].'-'.$num;
        Ciudad::create([
            'codciudad' => $codigo,
            'descciudad'=> $request->input('descciudad'),
            'codprovincia'=> $request->input('provincia'),

        ]); 
        return redirect('pagCiudades');
    }

    public function edit($id)
    {
        $codigo = Ciudad::where('codciudad', $id)->first();
        return view('ciudades_editar', compact('codigo'));
    }

    public function update(Request $request,$id)
    {
        $data = array(
            'descciudad'=>$request->input('descciudad'),
            
        );
        
        Ciudad::where('codciudad','=', $id)->update($data);
        return redirect('pagCiudades')->with('success','Registro actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        $ciudxsede = DB::table('sedes')->where('codciudad', '=', $id)->get();
        //dd($estudiantes->count());
        if($ciudxsede->count()==0)
        {
            $codigo = Ciudad::find($id);
            if ($codigo != null) {
                $codigo->delete();
                return back()->with(['message'=> 'Successfully deleted!!']);
            }
            return back()->with(['message'=> 'Wrong ID!!']);
        }
        else{
            return back()->with(['message'=> 'No se puede eliminar esa ciudad']);
        }
        
    }
}
