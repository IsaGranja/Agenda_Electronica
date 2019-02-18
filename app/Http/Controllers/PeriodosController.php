<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Periodos;

class PeriodosController extends Controller
{
    
    /*public function index()//GET
	{
		
		$periodos = DB::table('periodos')
					->join('sedes','sedes.codsede','=','periodos.codsede')
					->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
                    ->orderBy('codperiodo')
					->get();
        
        return view('periodos',compact('periodos')); 
	}*/
	public function index(Request $request)
    {
     
     if($request->get('periodo')!= ""){
        $periodos = DB::table('periodos')->join('sedes','sedes.codsede','=','periodos.codsede')
										->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
                                        ->where('periodos.codperiodo','LIKE','%'.$request->get('periodo').'%')
                                        ->orderBy('codperiodo')
                                        ->paginate();
                                        
        
        return view('periodos',compact('periodos'));
     }
     else{
        $periodos = DB::table('periodos')->join('sedes','sedes.codsede','=','periodos.codsede')
									->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
									->orderBy('codperiodo')
									->paginate();
        return view('periodos',compact('periodos'));
     }
    }
	
	public function create()
    {
        $sede = DB::table('sedes')->get();
        $universidad = DB::table('universidades')->get();
        return view('periodos_crear',compact('sede','universidad'));

	}
	public function fetch(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('sedes')
        ->where('coduniversidad', $value)
        ->groupBy('codsede')
        ->get();
        $output = '<option value="">Select Sede</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->descsede.'</option>';
        }
        echo $output;
	}
	public function store(Request $request)
    {
 
		periodos::create([ 
		'codperiodo'=>$request->input('codperiodo')."-".$request->input('codperiodoB'),
		'codsede'=>$request->input('codsede'),
		'fecinicioperiodo'=>$request->input('fecinicioperiodo'),
		'fecfinalperiodo'=>$request->input('fecfinalperiodo'),
		'estperiodo'=>"A"
	
		]);
		return redirect('pagPeriodos');


	}
	public function edit($id)
    {
        //$codigo = sedes::where('codsede', $id)->first();
        $codigo = DB::table('periodos')
					->join('sedes','sedes.codsede','=','periodos.codsede')
					->join('universidades','universidades.coduniversidad','=','sedes.coduniversidad')
                    ->where('codperiodo', $id)->first();
		$sede = DB::table('sedes')->get();
		$universidad = DB::table('universidades')->get();
		return view('periodos_editar', compact('codigo','sede','universidad'));
		
        
    }
	public function destroy($codperiodo)
    {
        $codigo = periodos::where('codperiodo', $codperiodo)->first();
        
        if ($codigo != null) {
            $codigo->delete();
            return back()->with(['message'=> 'Successfully deleted!!']);
        }
        return back()->with(['message'=> 'Wrong ID!!']);
	}
	
}
