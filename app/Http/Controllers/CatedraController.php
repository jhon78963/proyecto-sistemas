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
    const PAGINACION = 100;
    public function index()
    {
        $seccion = Seccion::all();
        $cursos = Curso::where('estado','=','1')->paginate($this::PAGINACION);
        $docente = Docente::all();
        $catedra= Catedra::all();
        $niveles = Nivel::all();
        $cursos = Curso::all();
        return view('catedras.index',compact('catedra','catedra','cursos','docente','niveles'));
    }

    public function create()
    {
        $seccion = Seccion::all();
        $catedras= Catedra::all();
        $niveles = Nivel::all();
        $grados = Grado::all();
        return view('catedras.show',compact('seccion','niveles','grados','catedras'));
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
                $curso=Curso::findOrFail($cur[0]);
                $curso->estado='0';
                $curso->save();
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

    public function mostrar(){
        
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
