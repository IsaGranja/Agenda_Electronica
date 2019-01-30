<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});



Route::get('/','HomeController@homeFunc');
Route::get('/pagLogin','HomeController@loginFunc');
Route::get('/pagAudio','HomeController@audioFunc');
Route::get('/pagVideo','HomeController@videoFunc');
Route::get('/pagImagen','HomeController@imagenFunc');
Route::get('/pagBase','HomeController@baseFunc');
Route::get('/pagProvincias','HomeController@provinciasFunc');
Route::get('/pagCiudades','HomeController@ciudadesFunc');
Route::get('/pagUniversidades','HomeController@universidadesFunc');
Route::get('/pagSedes','HomeController@sedesFunc');
Route::get('/pagPeriodos','HomeController@periodosFunc');
Route::get('/pagFacultades','HomeController@facultadesFunc');
Route::get('/pagFacultadesxSede','HomeController@facultadesxSedeFunc');
Route::get('/pagEscuelas','HomeController@escuelasFunc');
Route::get('/pagCarreras','HomeController@carrerasFunc');
Route::get('/pagEstudiantes','HomeController@estudiantesFunc');
Route::get('/pagEstudiantesExcel','HomeController@estudiantesExcelFunc');
Route::get('/pagProfesores','HomeController@profesoresFunc');
Route::get('/pagAsignaturasxEstudiante','HomeController@asignaturasxEstudianteFunc');
Route::get('/pagAsignaturasxProfesor','HomeController@asignaturasxProfesorFunc');
Route::get('/pagContenidos','HomeController@contenidosFunc');
Route::get('/pagUnidades','HomeController@unidadesFunc');
Route::get('/pagTemas','HomeController@temasFunc');
Route::get('/pagTalleres','HomeController@talleresFunc');
Route::get('/pagEvaluaciones','HomeController@evaluacionesFunc');
Route::get('/pagGlosarios','HomeController@glosariosFunc');
Route::get('/pagAnotaciones','HomeController@anotacionesFunc');

*/

Route::get('/','HomeController@homeFunc');
Route::get('/pagLogin','HomeController@loginFunc');
Route::get('/pagAudio','HomeController@audioFunc');
Route::get('/pagVideo','HomeController@videoFunc');
Route::get('/pagImagen','HomeController@imagenFunc');

Route::view('/pagProvincias','provincias');
Route::view('/pagCiudades','ciudades');
Route::view('/pagUniversidades','universidades');
Route::view('/pagSedes','sedes');
Route::view('/pagPeriodos','periodos');
Route::view('/pagFacultades','facultades');
Route::view('/pagFacultadesxSede','facultadesxSede');
Route::view('/pagEscuelas','escuelas');
Route::view('/pagCarreras','carreras');
Route::view('/pagEstudiantes','estudiantes');
Route::view('/pagEstudiantesExcel','estudiantesExcel');
Route::view('/pagProfesores','profesores');
Route::view('/pagAsignaturas','asignaturas');
Route::view('/pagAsignaturasxEstudiante','asignaturasxEstudiante');
Route::view('/pagAsignaturasxProfesor','asignaturasxProfesor');
Route::view('/pagContenidos','contenidos');
Route::view('/pagUnidades','unidades');
Route::view('/pagTemas','temas');
Route::view('/pagTalleres','talleres');
Route::view('/pagEvaluaciones','evaluaciones');
Route::view('/pagGlosarios','glosarios');
//Route::view('/pagAnotaciones','anotaciones');
