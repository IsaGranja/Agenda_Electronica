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


*/

Route::get('/','HomeController@homeFunc');
Route::get('/pagLogin','HomeController@loginFunc');
Route::get('/pagAudio','HomeController@audioFunc');
Route::get('/pagVideo','HomeController@videoFunc');
Route::get('/pagImagen','HomeController@imagenFunc');


Route::get('/pagProvincias','ProvinciaController@index');
Route::get('/pagProvincias/crear','ProvinciaController@create');
Route::post('/pagProvincias/crear','ProvinciaController@store');
Route::get('/pagProvincias/editar/{codprovincia}','ProvinciaController@edit');
Route::post('/pagProvincias/editar/{codprovincia}','ProvinciaController@update');
Route::get('/pagProvincias/{codprovincia}','ProvinciaController@destroy');

Route::view('/pagCiudades','ciudades');
Route::get('/pagUniversidades','UniversidadesController@index');
Route::get('/pagUniversidades/crear','UniversidadesController@create');
Route::post('/pagUniversidades/crear','UniversidadesController@store');
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
