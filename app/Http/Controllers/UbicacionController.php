<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Grado;
use App\GradosP;
use App\Departamento;
use App\Provincia;
use App\Distrito;

class UbicacionController extends Controller
{
    const PAGINACION = 10;
    public function index(Request $request)
    {
        $buscarpor = $request->buscarpor;
        $niveles=Nivel::all();
        $grados=Grado::all();
        $departamentos=Departamento::all();
        $provincias=Provincia::all();
        $distrito=Distrito::where('distrito','like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('ubicaciones.index',compact('distrito','niveles','grados','departamentos','distrito','buscarpor'));

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
