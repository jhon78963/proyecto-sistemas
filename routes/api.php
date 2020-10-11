<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pais/{id}/departamentos','DepartamentoController@byPais');
Route::get('/departamento/{id}/provincias','ProvinciaController@byDepartamento');
Route::get('/provincia/{id}/distritos','DistritoController@byProvincia');
Route::get('/niveles','NivelController@niveles');
Route::get('/nivel/{id}/grados','GradoController@byNivel');
Route::get('/grado/{id}/secciones','SeccionController@byGrado');
Route::get('/alumno/{id}','AlumnoController@show');
Route::get('/matricula/{id}','MatriculaController@show');
Route::get('/matricula/periodo/{periodo}','MatriculaController@matriculasxperiodo');
Route::get('/matricula/{periodo}/{id}','MatriculaController@alumnoxperiodo');
Route::get('/docente/{id}','DocenteController@show');
Route::get('/catedra/{id}/cursos', 'CatedraController@byCursos');
