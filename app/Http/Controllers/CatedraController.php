<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Docente;
use App\Catedra;
use Illuminate\Support\Facades\DB;

class CatedraController extends Controller
{

    public function index()
    {
        $docente = Docente::all();
        $catedra = DB::table('catedras')->select('IDDOCENTE')->distinct()->get();
        $catedras= Catedra::all();
        $niveles = Nivel::all();
        return view('catedras.index',compact('catedra','docente','niveles'));
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
