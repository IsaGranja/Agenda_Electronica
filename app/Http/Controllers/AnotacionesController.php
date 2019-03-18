<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\anotaciones;
use App\Asignaturasxestudiante;
use App\periodos;
use App\AsignaturaModel;
use App\Unidades;
use DB;

class AnotacionesController extends Controller
{
	private $cedestudiante;

	public function periodoFunc()
	{	
		try{
			$contenidos=[];
			$user = Auth::user();
			$email=$user->email;
			$this->cedestudiante = DB::table('estudiantes')
						->where('correestudiante', $email)
						->value('cedestudiante');
			$periodos = asignaturasxestudiantes::select('codperiodo')
						->where('cedestudiante', $this->cedestudiante)
						->groupBy('codperiodo')
						->orderby('codperiodo','desc')
						->get();
		}catch(\Exception $e)
		{
			return back()->withError($e->getMessage());
		}
		return view('home',compact('periodos','contenidos'));	
	}

	public function findAsignaturaFunc()
	{
		$user = Auth::user();
			$email=$user->email;
			$this->cedestudiante = DB::table('estudiantes')
						->where('correestudiante', $email)
						->value('cedestudiante');

		$codperiodo=Input::get('codperiodo');

		$asignaturasxestudiante= DB::table('asignaturas')
				->select('asignaturas.codasignatura','asignaturas.descasignatura')
				->join('asignaturasxestudiantes','asignaturasxestudiantes.codasignatura', '=', 'asignaturas.codasignatura')
				->where('asignaturasxestudiantes.codperiodo','=',$codperiodo)
				->where('asignaturasxestudiantes.cedestudiante','=',$this->cedestudiante)
				->orderby('asignaturas.codasignatura','ASC')
				->get();	

		return response()->json($asignaturasxestudiante);
	}
	public function findUnidadFunc()
	{
		$codasignatura=Input::get('codasignatura');
		$unidades=DB::table('unidades_estudio')
		->select('codunidad', 'descunidad')
		->where('unidades_estudio.codasignatura','=',$codasignatura)
		->orderby('codunidad','ASC')
		->get();
		return response()->json($unidades);
	}
	public function findTemaFunc()
	{
		$codunidad=Input::get('codunidad');
		$temas=DB::table('temas_estudio')
		->select('codtema', 'numtema', 'desctema')
		->where('codunidad','=',$codunidad)
		->orderby('codtema','ASC')
		->get();

		return response()->json($temas);
	}
	public function findContenidoFunc()
	{
		$codtema=Input::get('codtema');
		$contenidos=DB::table('contenidos')
		->where('codtema','=',$codtema)		
		->orderby('codcontenido','ASC')
		->get();

		return response()->json($contenidos);
	}
	public function findContenido1Func()
	{
		$codcontenido=Input::get('codcontenido');
		$contenidos=DB::table('contenidos')
		->where('codcontenido','=',$codcontenido)
		->get();

		return response()->json($contenidos);
	}
	public function findEvaluacionFunc()
	{
		$codtema=Input::get('codtema');
		$evaluaciones=DB::table('evaluaciones')
		->where('codtema','=',$codtema)
		->get();

		return response()->json($evaluaciones);
	}
	public function findEvaluacionFunc1(Request $request)
	{
		$array = $request->all();
		$codtema=$array['codtema'];
		$codpregunta=$array['enunpregevaluacion'];
		print_r($codpregunta);
		$evaluaciones=DB::table('evaluaciones')
		->where('codtema','=',$codtema)
		->where('enunpregevaluacion','=',$codpregunta)
		->get();

		return response()->json($evaluaciones);
	}
	public function findGlosarioFunc()
	{
		$codcontenido=Input::get('codcontenido');
		$glosarios=DB::table('glosarios')
		->where('codcontenido','=',$codcontenido)
		->get();

		return response()->json($glosarios);
	}
	public function findAnotacionesFunc()
	{
		$codcontenido=Input::get('codcontenido');

		//CONSULTAR
		$user = Auth::user();
		$email=$user->email;
		$cedestudiante = DB::table('estudiantes')
					->where('correestudiante', $email)
					->value('cedestudiante');		

		$anotaciones=DB::table('anotaciones_estudiante')
		->where('cedestudiante','=',$cedestudiante)
		->where('codcontenido','=',$codcontenido)
		->get();

		return response()->json($anotaciones);
	}
	public function store1(Request $request)//POST
	{
		return \App\anotaciones::create($request->all());
	}
	public function createOrUpdate(Request $request)
	{
		//try{
		//CONSULTAR
		$user = Auth::user();
		$email=$user->email;
		$cedestudiante = DB::table('estudiantes')
					->where('correestudiante', $email)
					->value('cedestudiante');		
		$codcontenido=Input::get('codcontenido');
		$anota=Input::get('anotestudiante');

		$anotacion=anotaciones::where('cedestudiante','=',$cedestudiante)
		->where('codcontenido','=',$codcontenido)
		->count();
		if($anotacion > 0){
			$update= anotaciones::where('cedestudiante', '=', $cedestudiante)
			->where('codcontenido', '=', $codcontenido)
			->update(['anotestudiante' => $anota]);
			//return redirect('anotacion');
			return response()->json($anotacion);
		}
		else
		{
			$insert= anotaciones::insert(['cedestudiante'=>$cedestudiante,'codcontenido'=>$codcontenido,'anotestudiante'=>$anota,'imgestudiante'=>'']);
			//return redirect('anotacion');
			return response()->json($anotacion);
		}
/*
		$wishlist=DB::table('wishlist')
		->where('user_id','=',$user_id)
		->where('product_id','=',$product_id)
		->count();

		if($wishlist > 0){
		return redirect('wishlist');
		}
		else{
		DB::table('wishlist')
		->insert(['id'=>$id,'user_id'=>$user_id,'product_id'=>$product_id]);
		return redirect('wishlist');
		}
*/

		
	}
	
	public function index()
    {
		try{
			$user = Auth::user();
			$email=$user->email;
			$cedestudiante = DB::table('estudiantes')
						->where('correestudiante', $email)
						->value('cedestudiante');
			$periodos = DB::table('asignaturasxestudiantes')
						->select('codperiodo')
						->where('cedestudiante', $cedestudiante)
						->groupBy('codperiodo')
						->orderby('codperiodo','desc')
						->get();
			$asignaturasxestudiante= DB::table('asignaturasxestudiantes')->where('cedestudiante', $cedestudiante);
			$asignatura= DB::table('asignaturas')->select('*')->get();
			$unidades_estudio=DB::table('unidades_estudio')->select('*')->get();
			$temas_estudio=DB::table('temas_estudio')->select('*')->get();
			$contenidos=DB::table('contenidos')->select('*')->get();
			$talleres=DB::table('talleres')->select('*')->get();
			$evaluaciones=DB::table('evaluaciones')->select('*')->get();
			$glosarios=DB::table('glosarios')->select('*')->get();
			$anotaciones=DB::table('anotaciones_estudiante')->select('*')->get();
		}catch(\Exception $e)
		{
			return back()->withError($e->getMessage());
		}
		return view('home',compact('periodos','asignaturasxestudiante','asignatura','unidades','temas',
		'talleres', 'evaluaciones','glosarios','anotaciones'));
	}
	/*
    public function index()//GET
	{
		return \App\anotaciones::all();
	}*/
    public function show($id)//GET
	{
		return \App\anotaciones::find($id);
	}

	/*
	public function store(Request $request)//POST
	{
		return \App\anotaciones::create($request->all());
	}*/
	public function edit(Request $request, $id)//PUT
	{
		$registro = \App\anotaciones::findOrFail($id);
		$registro -> update($request->all());

		return $registro;
	}
	public function destroy($id)//DELETE
	{
		$registro = \App\anotaciones::findOrFail($id);
		$registro -> delete();

		return 204; //hubo una ejecución de instrucción exitosa
	}
}