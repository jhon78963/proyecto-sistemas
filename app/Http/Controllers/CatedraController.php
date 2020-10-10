<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Grado;
use App\Nivel;
use App\Curso;
use App\Docente;
use App\Catedra;
use DB;

class CatedraController extends Controller
{
    public function index()
    {
        $seccion = Seccion::all();
        $cursos = Curso::all();
        $docente = Docente::all();
        $catedra = Catedra::all();
        $niveles = Nivel::all();
        $grados = Grado::all();
        return view('catedras.index',compact('catedra','seccion','docente','cursos','niveles','grados'));
    }

    public function create()
    {
        return view('catedras.create');
    }

    public function store(Request $request)
    {
        // Catedra::create($request->all());
        try
        {
            DB::beginTransaction();
            $cursos=$request->IDCURSO;
            foreach ($cursos as $cur) 
            { 
                $catedra= new Catedra();
                $catedra->AÑOESCOLAR=$request->AÑOESCOLAR;
                $catedra->IDDOCENTE=$request->IDDOCENTE;
                $catedra->IDCURSO=$cur[0];
                $catedra->save();
            }
            DB::commit();
        }
        catch(\Exception $e)
        {
            dd($e);
            DB::rollback();
        }
        return redirect()->route('catedra.index');
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
