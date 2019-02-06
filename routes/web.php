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
});*/
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
//Route::get('/pagAsignaturasxEstudiante','HomeController@asignaturasxEstudianteFunc');
Route::get('/pagAsignaturasxProfesor','HomeController@asignaturasxProfesorFunc');
//Route::get('/pagContenidos','HomeController@contenidosFunc');
Route::get('/pagUnidades','HomeController@unidadesFunc');
Route::get('/pagTemas','HomeController@temasFunc');
Route::get('/pagTalleres','HomeController@talleresFunc');
Route::get('/pagEvaluaciones','HomeController@evaluacionesFunc');
Route::get('/pagGlosarios','HomeController@glosariosFunc');
Route::get('/pagAnotaciones','HomeController@anotacionesFunc');

//Route::resource('asignaturasestu', 'AsignaturasxEstudiantesController');
Route::resource('contenidos', 'ContenidosController');

Route::resource('talleres', 'TalleresController');
//Route::get('eliminarTaller/{archivotaller}', 'TalleresController@destroy');
//Route::get('guardarTaller', 'TalleresController@store');

Route::resource('pagAsigxEstu','AsignaturaXEstudianteController');
Route::post('actualizarAsigxestu', 'AsignaturaXEstudianteController@update');
//Route::post('contenidos', 'ContenidosController@validarImagen');