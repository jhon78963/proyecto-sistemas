<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Grado;
use App\Seccion;
use App\Curso;

class MantenedorController extends Controller
{
    public function index()
    {

        $niveles=Nivel::all();
        $grados=Grado::all();
        $cursos=Curso::all();
        $secciones=Seccion::all();

        return view('grados.index',compact('niveles','grados','secciones','cursos'));
    }

    const PAGINACION = 42;
    public function buscar($id,Request $request){

        $buscarpor = $request->buscarpor;
        $niveles=Nivel::all();
        $grados=Grado::all();
        $grado=Grado::findOrFail($id);
        $cursos=Curso::all();
        $secciones=Seccion::where('seccion','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('grados.index',compact('niveles','grados','grado','secciones','cursos','buscarpor'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
