<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Periodos;

class PeriodosController extends Controller
{
    
    public function index()//GET
	{
		return \App\Periodos::all();
	}
    public function show($id)//GET
	{
		return \App\Periodos::find($id);
	}
	public function store(Request $request)//POST
	{
		return \App\Periodos::create($request->all());
	}
	public function edit(Request $request, $id)//PUT
	{
		$registro = \App\Periodos::findOrFail($id);
		$registro -> update($request->all());

		return $registro;
	}
	public function destroy($id)//DELETE
	{
		$registro = \App\Periodos::findOrFail($id);
		$registro -> delete();

		return 204; //hubo una ejecución de instruccion exitosa
	}
}
