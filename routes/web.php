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


//PROVINCIAS
Route::get('/pagProvincias','ProvinciaController@index');
Route::get('/pagProvincias/crear','ProvinciaController@create');
Route::post('/pagProvincias/crear','ProvinciaController@store');
Route::get('/pagProvincias/editar/{codprovincia}','ProvinciaController@edit');
Route::post('/pagProvincias/editar/{codprovincia}','ProvinciaController@update');
Route::get('/pagProvincias/{codprovincia}','ProvinciaController@destroy');
//UNIVERSIDADES
Route::get('/pagUniversidades','UniversidadesController@index');
Route::get('/pagUniversidades/crear','UniversidadesController@create');
Route::post('/pagUniversidades/crear','UniversidadesController@store');
Route::get('/pagUniversidades/editar/{coduniversidad}','UniversidadesController@edit');
Route::post('/pagUniversidades/editar/{coduniversidad}','UniversidadesController@update');
Route::post('/pagUniversidades/{coduniversidad}','UniversidadesController@destroy');
//SEDES
Route::get('/pagSedes','SedesController@index');
Route::get('/pagSedes/crear','SedesController@create');
Route::post('/pagSedes/crear','SedesController@store');
Route::post('/pagSedes/{codsede}','SedesController@destroy');
Route::get('/pagSedes/editar/{codsede}','SedesController@edit');
Route::post('/pagSedes/editar/{codsede}','SedesController@update');
//PERIODOS
Route::get('/pagPeriodos','PeriodosController@index');
Route::get('/pagPeriodos/crear','PeriodosController@create');
Route::post('/pagPeriodos/crear','PeriodosController@store');
Route::get('/pagPeriodos/editar/{codperiodo}','PeriodosController@edit');
Route::post('/pagPeriodos/editar/{codperiodo}','PeriodosController@update');
Route::post('/pagPeriodos/{codperiodo}','PeriodosController@destroy');
Route::post('pagPeriodos/crear/fetch','PeriodosController@fetch')->name('pagPeriodos.fetch');
//FACULTADES
Route::get('/pagFacultades','FacultadController@index');
Route::get('/pagFacultades/crear','FacultadController@create');
Route::post('/pagFacultades/crear','FacultadController@store');
Route::get('/pagFacultades/editar/{id}','FacultadController@edit');
Route::post('/pagFacultades/editar/{id}','FacultadController@update');
Route::get('/pagFacultades/{id}','FacultadController@destroy');
//FACULTADESXSEDES
Route::get('/pagFacultadesxSede','FacultadxSedeController@index');
Route::get('/pagFacultadesxSede/crear','FacultadxSedeController@create');
Route::post('/pagFacultadesxSede/crear','FacultadxSedeController@store');
Route::get('/pagFacultadesxSede/editar/{id}','FacultadxSedeController@edit');
Route::post('/pagFacultadesxSede/editar/{id}','FacultadxSedeController@update');
Route::get('/pagFacultadesxSede/{id}','FacultadxSedeController@destroy');
Route::post('pagFacultadesxSede/crear/fetch','FacultadxSedeController@fetch')->name('pagFacultadesxSede.fetch'); 
//ESCUELAS
Route::get('/pagEscuelas','EscuelasController@index');
Route::get('/pagEscuelas/crear','EscuelasController@create');
Route::post('/pagEscuelas/crear','EscuelasController@store');
Route::get('/pagEscuelas/editar/{id}','EscuelasController@edit');
Route::post('/pagEscuelas/editar/{id}','EscuelasController@update');
Route::get('/pagEscuelas/{id}','EscuelasController@destroy');
//CARRERAS
Route::get('/pagCarreras','CarrerasController@index');
Route::get('/pagCarreras/crear','CarrerasController@create');
Route::post('/pagCarreras/crear','CarrerasController@store');
Route::get('/pagCarreras/editar/{id}','CarrerasController@edit');
Route::post('/pagCarreras/editar/{id}','CarrerasController@update');
Route::get('/pagCarreras/{id}','CarrerasController@destroy');
//ESTUDIANTES EXCEL
Route::view('/pagEstudiantesExcel','estudiantesExcel');
Route::post('import', 'EstudianteExcelController@estudianteImport')->name('estudiante.import');
Route::resource('pagEstudiantes-excel','EstudianteExcelController');
//ASIGNATURAS
Route::view('/pagAsignaturas','asignaturas');
Route::view('/pagAsignaturasxEstudiante','asignaturasxEstudiante');
Route::view('/pagAsignaturasxProfesor','asignaturasxProfesor');
Route::view('/pagContenidos','contenidos');
Route::resource('pagAsignaturas','AsignaturaController');
Route::post('actualizarAsignatura', 'AsignaturaController@update');
//UNIDADES
Route::get('/pagUnidades','UnidadesController@index');
Route::get('/pagUnidades/crear','UnidadesController@create');
Route::post('pagUnidades/crear/fetch','UnidadesController@fetch')->name('pagUnidades.fetch');
Route::post('/pagUnidades/crear','UnidadesController@store');
Route::get('/pagUnidades/editar/{codunidad}','UnidadesController@edit');
Route::post('pagUnidades/editar/fetch','UnidadesController@fetch')->name('pagUnidades.fetch');
Route::post('/pagUnidades/editar/{codunidad}','UnidadesController@update');
Route::get('/pagUnidades/{codunidad}','UnidadesController@destroy');
//TEMAS
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

//TALLERES
Route::view('/pagTalleres','talleres');
Route::resource('talleres', 'TalleresController');
Route::post('actualizarTalleres', 'TalleresController@update');
//Route::get('eliminarTaller/{archivotaller}', 'TalleresController@destroy');
//Route::get('guardarTaller', 'TalleresController@store');

//EVALUACIONES
Route::get('/pagEvaluaciones','EvaluacionController@index');
Route::post('/pagEvaluaciones/guardar','EvaluacionController@store');
Route::get('/pagEvaluaciones/borrar/{Pregunta}','EvaluacionController@destroy');
//GLOSARIOS
Route::resource('glosarios', 'GlosariosController');
Route::post('actualizarGlosarios', 'GlosariosController@update');
//CONTENIDOS
Route::resource('contenidos', 'ContenidosController');
Route::post('actualizarContenidos', 'ContenidosController@update');
//Route::post('contenidos', 'ContenidosController@validarImagen');
//ASIGNATURAS POR ESTUDIANTE
Route::resource('pagAsigxEstu','AsignaturaXEstudianteController');
Route::post('actualizarAsigxestu', 'AsignaturaXEstudianteController@update');

//ASIGNATURAS POR PROFESORES
Route::resource('pagAsigxProf','AsignaturaXProfesorController');
Route::post('actualizarAsigxprof', 'AsignaturaXProfesorController@update');

//CIUDADES
Route::get('/pagCiudades','CiudadController@index');
Route::get('/pagCiudades/crear','CiudadController@create');
Route::post('/pagCiudades/crear','CiudadController@store');
Route::get('/pagCiudades/editar/{id}','CiudadController@edit');
Route::post('/pagCiudades/editar/{id}','CiudadController@update');
Route::post('/pagCiudades/{id}','CiudadController@destroy');

//ESTUDIANTES
Route::get('/pagEstudiantes','EstudianteController@index');
Route::get('/pagEstudiantes/crear','EstudianteController@create');
Route::post('/pagEstudiantes/crear','EstudianteController@store');
Route::get('/pagEstudiantes/editar/{id}','EstudianteController@edit');
Route::post('/pagEstudiantes/editar/{id}','EstudianteController@update');
Route::post('/pagEstudiantes/{id}','EstudianteController@destroy');
//PROFESORES
Route::get('/pagProfesores','ProfesorController@index');
Route::get('/pagProfesores/crear','ProfesorController@create');
Route::post('/pagProfesores/crear','ProfesorController@store');
Route::get('/pagProfesores/editar/{id}','ProfesorController@edit');
Route::post('/pagProfesores/editar/{id}','ProfesorController@update');
Route::post('/pagProfesores/{id}','ProfesorController@destroy');

//LOGIN E INTERFAZ PRINCIPAL:
Route::get('/','MainController@index');
Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('/main/successlogin', 'MainController@successlogin');
Route::get('/main/logout', 'MainController@logout');

Route::get('/json-asignaturas', 'AnotacionesController@findAsignaturaFunc');
Route::get('/json-unidades', 'AnotacionesController@findUnidadFunc');
Route::get('/json-temas', 'AnotacionesController@findTemaFunc');
Route::get('/json-contenidos', 'AnotacionesController@findContenidoFunc');
Route::get('/json-contenidosUnico', 'AnotacionesController@findContenido1Func');
Route::get('/json-evaluaciones', 'AnotacionesController@findEvaluacionFunc');
//
Route::get('/json-evaluaciones1', 'AnotacionesController@findEvaluacionFunc1');
//
Route::get('/json-glosarios', 'AnotacionesController@findGlosarioFunc');
Route::get('/json-anotaciones', 'AnotacionesController@findAnotacionesFunc');
Route::post('/json-anotacionesCreate', 'AnotacionesController@store');
Route::resource('/main/successlogin', 'AnotacionesController');
Route::post('/main/successlogin/actualizarAnotaciones', 'AnotacionesController@update');
