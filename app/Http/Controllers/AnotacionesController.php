<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\anotaciones;
use DB;

class AnotacionesController extends Controller
{
	public function index()
    {
		$user = Auth::user();
		$email=$user->email;

		$cedestudiante = DB::table('estudiantes')->where('correestudiante', $email)->value('cedestudiante');
        $periodos = DB::table('asignaturasxestudiantes')->where('cedestudiante', $cedestudiante)->get();
        return view('home',['periodos'=>$periodos]);
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

		return 204; //hubo una ejecución de instruccion exitosa
	}
}