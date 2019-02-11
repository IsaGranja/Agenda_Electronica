<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Evaluacion;
use App\TemasEstudio;

use App\Universidades;
use App\Sedes;
use App\FacultadesxSedes;
use App\Escuelas;
use App\Carreras;
use App\Asignatura;
use App\Contenido;

class EvaluacionController extends Controller
{
    public function index(){
        $universidad = Universidades::all();
        $sedes = Sedes::all();
        $facultadesxsedes = FacultadesxSedes::all();
        $escuelas = Escuelas::all();
        $carreras = Carreras::all();
        $asignatura = Asignatura::all();
        $unicarrera = 'hola';
        $evaluaciones = Evaluacion::all();
        $tema = TemasEstudio::all();
        $contenido = Contenido::all();
        
        return view('evaluaciones',compact('universidad','asignatura','tema','contenido')); 
    }

    public function store(Request $request)
    {
        $ultimo = Evaluacion::all()->sortBy('codpregunta')->last();
        $ult = $ultimo->codprovincia + 1;
        $codigo = $request->input('codtema') . '' . ult;
        Evaluacion::create([
            'codtema' => $request->input('codtema'),
            'codpregunta' => $request->input('codpregunta'),
            'enunpregevaluacion' => $request->input('pregunta'),
            'op1evaluacion' => $request->input('opcion1'),
            'op2evaluacion' => $request->input('opcion2'),
            'op3evaluacion' => $request->input('opcion3'),
            'op4evaluacion' => $request->input('opcion4'),
            'respevaluacion' => $request->input('respuesta'),
            'retroevaluacion'=> $request->input('retroalimentacion')
        ]);
        return redirect('pagEvaluaciones');
    }

    public function destroy($Pregunta)
    {
        $codigo = Evaluacion::where('codpregunta', $Pregunta)->first();
        if ($codigo != null) {
            $codigo->delete();
            return back()->with(['message'=> 'Eliminado']);
        }
        return back()->with(['message'=> 'Error']);
    }
}
