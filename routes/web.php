<?php

use Illuminate\Support\Facades\Route;

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

//login

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::resource('bienvenido','HomeController');

//grados
route::get('grados-de-estudios/{id}','MantenedorController@buscar')->name('grados-de-estudios.buscar');
Route::resource('grados-de-estudios','MantenedorController');
Route::resource('profile','UserController');

//Curso
route::get('cancelar',function (){
    return redirect()->route('curso.index')->with('datos','Acción Cancelada');
})->name('cancelar');
route::get('curso/{idCurso}/confirmar','CursoController@confirmar')->name('curso.confirmar');
route::post('curso/{idCurso}/update','CursoController@update')->name('curso.update');
Route::resource('curso','CursoController');


//Docente
route::get('cancelar1',function (){
    return redirect()->route('docente.index')->with('datos','Acción Cancelada');
})->name('cancelar1');
route::get('docente/{idCurso}/confirmar','DocenteController@confirmar')->name('docente.confirmar');
route::post('docente/{idCurso}/update','DocenteController@update')->name('docente.update');
Route::resource('docente','DocenteController');

//Ubicación Geográfica
Route::resource('ubicacion','UbicacionController');

//Alumno
route::get('cancelar2',function (){
    return redirect()->route('alumno.index')->with('datos','Acción Cancelada');
})->name('cancelar2');
route::get('alumno/{IDALUMNO}/confirmar','AlumnoController@confirmar')->name('alumno.confirmar');
route::post('alumno/{IDALUMNO}/update','AlumnoController@update')->name('alumno.update');
Route::resource('alumno','AlumnoController');

//Matricula
route::get('cancelar3',function (){
    return redirect()->route('matricula.index')->with('datos','Acción Cancelada');
})->name('cancelar3');
route::get('matricula/{IDMATRICULA}/confirmar','MatriculaController@confirmar')->name('matricula.confirmar');
route::post('matricula/{IDMATRICULA}/update','MatriculaController@update')->name('matricula.update');
Route::resource('matricula', 'MatriculaController');

//Catedra
Route::resource('catedra', 'CatedraController');
Route::get('catedra/mostrar', 'CatedraController@mostrar')->name('catedra.mostrar');


// Concepto
Route::resource('concepto', 'ConceptoController');
Route::get('asignacion', 'ConceptoController@asignacion')->name('concepto.asignacion');
Route::get('condonacion', 'ConceptoController@condonacion')->name('concepto.condonacion');
