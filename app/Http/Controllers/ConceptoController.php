<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nivel;
use App\Concepto;
use App\Alumno;

class ConceptoController extends Controller
{
    //
    public function index(Request $request)
    {
        $descripcion = $request->buscarpor;
        $niveles = Nivel::all();
        $conceptos = Concepto::where('estado','=','1')->where('descripcion','like','%'.$descripcion.'%')->paginate(10);
        return view('conceptos.index', ['niveles' => $niveles, 'conceptos'=>$conceptos, 'buscarpor'=>$descripcion])->render();
    }

    public function asignacion(){
        $alumnos = Alumno::all();
        $niveles = Nivel::all();
        return view('conceptos.asignacion',['alumnos'=>$alumnos, 'niveles'=>$niveles]);
    }

    public function destroy($id)
    {
        $concepto = Concepto::find($id);
        $concepto->estado = '0';
        $concepto->save();
        return redirect()->route('concepto.index')->with('datos','Concepto Eliminado...');
    }
}
