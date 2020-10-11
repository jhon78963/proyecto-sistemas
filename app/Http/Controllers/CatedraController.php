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
        // join('docentes as d','d.IDDOCENTE','=','c.IDDOCENTE')->distinct('IDDOCENTE')->get();
        $seccion = Seccion::all();
        $cursos = Curso::all();
        $docente = Docente::all();
        $catedras= Catedra::all();
        $niveles = Nivel::all();
        $grados = Grado::all();
        return view('catedras.index',compact('seccion','docente','cursos','niveles','grados','catedras'));
    }

    public function create()
    {
        return view('catedras.create');
    }

    public function store(Request $request)
    {
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
