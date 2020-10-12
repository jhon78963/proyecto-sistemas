<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Concepto;
use App\Alumno;
use DB;

class ConceptoController extends Controller
{
    //
    public function index(Request $request)
    {
        $escala = $request->escala;
        $descripcion = $request->descripcion;
        $niveles = Nivel::all();
        $conceptos = Concepto::where('estado','=','1')
            ->where('escala','like','%'.$escala.'%')
            ->where('descripcion','like','%'.$descripcion.'%')
            ->paginate(10);
        return view('conceptos.index', ['niveles' => $niveles, 'conceptos'=>$conceptos, 'escala'=>$escala, 'descripcion'=>$descripcion])->render();
    }

    public function asignacion(){
        $alumnos = Alumno::all();
        $niveles = Nivel::all();
        return view('conceptos.asignacion',['alumnos'=>$alumnos, 'niveles'=>$niveles]);
    }

    public function condonacion()
    {
        $niveles = Nivel::all();
        return view('conceptos.condonacion',['niveles'=>$niveles]);
    }

    public function destroy($id)
    {
        $concepto = Concepto::find($id);
        $concepto->estado = '0';
        $concepto->save();
        return redirect()->route('concepto.index')->with('datos','Concepto Eliminado...');
    }
}
