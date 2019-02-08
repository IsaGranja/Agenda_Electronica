<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anotaciones;

class AnotacionesController extends Controller
{
    public function index()//GET
	{
		return \App\anotaciones::all();
	}
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