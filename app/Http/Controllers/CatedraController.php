<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Grado;
use App\Nivel;
use App\Curso;
use App\Docente;
use App\Catedra;

class CatedraController extends Controller
{
    const PAGINACION = 4;
    public function index()
    {
        $seccion = Seccion::all();
        $cursos = Curso::where('estado','=','1')->paginate($this::PAGINACION);
        $docente = Docente::all();
        $catedra = Catedra::all();
        $niveles = Nivel::all();
        $grados = Grado::all();
        return view('catedras.index',compact('catedra','seccion','docente','cursos','niveles','grados'));
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
        return Catedra::find($id);
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
