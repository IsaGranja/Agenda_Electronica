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
Route::view('/pagUniversidades','universidades');
Route::view('/pagSedes','sedes');
Route::view('/pagPeriodos','periodos');

Route::get('/pagFacultades','FacultadController@index');
Route::get('/pagFacultades/crear','FacultadController@create');
Route::post('/pagFacultades/crear','FacultadController@store');
Route::get('/pagFacultades/editar/{id}','FacultadController@edit');
Route::post('/pagFacultades/editar/{id}','FacultadController@update');
Route::get('/pagFacultades/{id}','FacultadController@destroy');

Route::get('/pagFacultadesxSede','FacultadxSedeController@index');
Route::get('/pagFacultadesxSede/crear','FacultadxSedeController@create');
Route::post('/pagFacultadesxSede/crear','FacultadxSedeController@store');
Route::get('/pagFacultadesxSede/editar/{id}','FacultadxSedeController@edit');
Route::post('/pagFacultadesxSede/editar/{id}','FacultadxSedeController@update');
Route::get('/pagFacultadesxSede/{id}','FacultadxSedeController@destroy'); 


Route::get('/pagEscuelas','EscuelasController@index');
Route::get('/pagEscuelas/crear','EscuelasController@create');
Route::post('/pagEscuelas/crear','EscuelasController@store');
Route::get('/pagEscuelas/editar/{id}','EscuelasController@edit');
Route::post('/pagEscuelas/editar/{id}','EscuelasController@update');
Route::get('/pagEscuelas/{id}','EscuelasController@destroy');


Route::get('/pagCarreras','CarrerasController@index');
Route::get('/pagCarreras/crear','CarrerasController@create');
Route::post('/pagCarreras/crear','CarrerasController@store');
Route::get('/pagCarreras/editar/{id}','CarrerasController@edit');
Route::post('/pagCarreras/editar/{id}','CarrerasController@update');
Route::get('/pagCarreras/{id}','CarrerasController@destroy');


Route::view('/pagEstudiantesExcel','estudiantesExcel');
Route::view('/pagAsignaturas','asignaturas');
Route::view('/pagAsignaturasxEstudiante','asignaturasxEstudiante');
Route::view('/pagAsignaturasxProfesor','asignaturasxProfesor');
Route::view('/pagContenidos','contenidos');

Route::get('/pagUnidades','UnidadesController@index');
Route::get('/pagUnidades/crear','UnidadesController@create');
Route::post('pagUnidades/crear/fetch','UnidadesController@fetch')->name('pagUnidades.fetch');
Route::post('/pagUnidades/crear','UnidadesController@store');
Route::get('/pagUnidades/editar/{codunidad}','UnidadesController@edit');
Route::post('pagUnidades/editar/fetch','UnidadesController@fetch')->name('pagUnidades.fetch');
Route::post('/pagUnidades/editar/{codunidad}','UnidadesController@update');
Route::get('/pagUnidades/{codunidad}','UnidadesController@destroy');

Route::get('/pagTemas','TemasController@index');
Route::get('/pagTemas/crear','TemasController@create');
Route::post('pagTemas/crear/byAsignatura','TemasController@byAsignatura')->name('pagTemas.byAsignatura');
Route::post('pagTemas/crear/byUnidad','TemasController@byUnidad')->name('pagTemas.byUnidad');
Route::post('/pagTemas/crear','TemasController@store');
Route::get('/pagTemas/editar/{codtema}/{codunidad}','TemasController@edit');
Route::post('pagTemas/editar/fetch','TemasController@byAsignatura')->name('pagTemas.byAsignatura');
Route::post('pagTemas/crear/fetch','TemasController@byUnidad')->name('pagTemas.byUnidad');
Route::post('/pagTemas/editar/{codtema}/{codunidad}','TemasController@update');
Route::get('/pagTemas/{codtema}','TemasController@destroy');


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
