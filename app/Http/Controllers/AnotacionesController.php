<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\anotaciones;
use App\Asignaturasxestudiante;
use App\periodos;
use App\AsignaturaModel;
use DB;

class AnotacionesController extends Controller
{
	private $cedestudiante;
	public function periodoFunc()
	{
		try{
			$user = Auth::user();
			$email=$user->email;
			$this->cedestudiante = DB::table('estudiantes')
						->where('correestudiante', $email)
						->value('cedestudiante');
			$periodos = asignaturasxestudiantes::select('codperiodo')
						->where('cedestudiante', $this->cedestudiante)
						->groupBy('codperiodo')
						->get();
		}catch(\Exception $e)
		{
			return back()->withError($e->getMessage());
		}
		return view('home',compact('periodos'));
	}
	public function findAsignaturaFunc()
	{
		$user = Auth::user();
			$email=$user->email;
			$this->cedestudiante = DB::table('estudiantes')
						->where('correestudiante', $email)
						->value('cedestudiante');

		$codperiodo=Input::get('codperiodo');

		$asignaturasxestudiante= AsignaturaModel::select('descasignatura')
				->join('asignaturasxestudiantes','asignaturasxestudiantes.codasignatura', '=', 'asignaturas.codasignatura')
				->where('asignaturasxestudiantes.codperiodo','=',$codperiodo)
				->where('asignaturasxestudiantes.cedestudiante','=',$this->cedestudiante)
				->get();	

		return response()->json($asignaturasxestudiante);
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
		return view('home',compact('periodos','asignaturasxestudiante','asignatura','unidades','temas','contenidos',
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
	public function store(Request $request)//POST
	{
		return \App\anotaciones::create($request->all());
	}
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