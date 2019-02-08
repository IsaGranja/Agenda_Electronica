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

Route::get('/','HomeController@loginFunc');
Route::get('/pagLogin','HomeController@loginFunc');
//Route::get('pagHome','HomeController@homeFunc');
Route::get('/pagAudio','HomeController@audioFunc');
Route::get('/pagVideo','HomeController@videoFunc');
Route::get('/pagImagen','HomeController@imagenFunc');
Route::get('/pagProvincias','ProvinciaController@index');
Route::get('/pagProvincias/crear','ProvinciaController@create');
Route::post('/pagProvincias/crear','ProvinciaController@store');
Route::get('/pagProvincias/editar/{codprovincia}','ProvinciaController@edit');
Route::post('/pagProvincias/editar/{codprovincia}','ProvinciaController@update');
Route::get('/pagProvincias/{codprovincia}','ProvinciaController@destroy');

Route::view('/pagHome','home');
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
Route::view('/pagEstudiantesExcel','estudiantesExcel');
Route::view('/pagAsignaturas','asignaturas');
Route::view('/pagAsignaturasxEstudiante','asignaturasxEstudiante');
Route::view('/pagAsignaturasxProfesor','asignaturasxProfesor');
Route::view('/pagContenidos','contenidos');

Route::get('/pagUnidades','UnidadesController@index');
Route::get('/pagUnidades/{id}','UnidadesController@byAsignatura');

Route::view('/pagTemas','temas');
Route::view('/pagTalleres','talleres');
Route::view('/pagEvaluaciones','evaluaciones');
Route::view('/pagGlosarios','glosarios');

//Route::resource('pagHome', 'HomeController');
//Route::view('/pagAnotaciones','anotaciones');

//Route::resource('asignaturasestu', 'AsignaturasxEstudiantesController');
Route::resource('contenidos', 'ContenidosController');

Route::resource('talleres', 'TalleresController');
//Route::get('eliminarTaller/{archivotaller}', 'TalleresController@destroy');
//Route::get('guardarTaller', 'TalleresController@store');

Route::resource('pagAsigxEstu','AsignaturaXEstudianteController');
Route::post('actualizarAsigxestu', 'AsignaturaXEstudianteController@update');
//Route::post('contenidos', 'ContenidosController@validarImagen');

Route::resource('pagEstudiantes-excel','EstudianteExcelController');

Route::resource('pagAsigxProf','AsignaturaXProfesorController');
Route::post('actualizarAsigxprof', 'AsignaturaXProfesorController@update');

Route::resource('pagAsignaturas','AsignaturaController');
Route::post('actualizarAsignatura', 'AsignaturaController@update');

Route::get('/pagCiudades','CiudadController@index');
Route::get('/pagCiudades/crear','CiudadController@create');
Route::post('/pagCiudades/crear','CiudadController@store');
Route::get('/pagCiudades/editar/{id}','CiudadController@edit');
Route::post('/pagCiudades/editar/{id}','CiudadController@update');
Route::post('/pagCiudades/{id}','CiudadController@destroy');

Route::get('/pagEstudiantes','EstudianteController@index');
Route::get('/pagEstudiantes/crear','EstudianteController@create');
Route::post('/pagEstudiantes/crear','EstudianteController@store');
Route::get('/pagEstudiantes/editar/{id}','EstudianteController@edit');
Route::post('/pagEstudiantes/editar/{id}','EstudianteController@update');
Route::post('/pagEstudiantes/{id}','EstudianteController@destroy');

Route::get('/pagProfesores','ProfesorController@index');
Route::get('/pagProfesores/crear','ProfesorController@create');
Route::post('/pagProfesores/crear','ProfesorController@store');
Route::get('/pagProfesores/editar/{id}','ProfesorController@edit');
Route::post('/pagProfesores/editar/{id}','ProfesorController@update');
Route::post('/pagProfesores/{id}','ProfesorController@destroy');

Route::post('import', 'EstudianteExcelController@estudianteImport')->name('estudiante.import');
