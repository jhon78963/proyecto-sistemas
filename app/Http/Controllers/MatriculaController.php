<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Nivel;
use App\Grado;
use App\Seccion;
use App\Alumno;
use App\Pais;
use App\Docente;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $matriculas = Matricula::join('ALUMNOS', 'MATRICULAS.IDALUMNO', '=', 'ALUMNOS.IDALUMNO')
            ->where('MATRICULAS.estado','=',1)
            ->select(DB::raw("MATRICULAS.*, CONCAT(PRIMERNOMBRE,' ',OTROSNOMBRES,' ',APELLIDOPATERNO,' ',APELLIDOMATERNO) as NOMBRECOMPLETO, ALUMNOS.ESCALA"))
            ->get();
        $docente=Docente::all();
        $niveles=Nivel::all();
        $grados=Grado::all();
        $secciones=Seccion::all();
        return view('matricula.index',compact('matriculas','niveles','grados','secciones','docente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $raw=Alumno::raw("IDALUMNO, CONCAT(PRIMERNOMBRE,' ',OTROSNOMBRES,' ',APELLIDOPATERNO,' ',APELLIDOMATERNO) as NOMBRECOMPLETO");
        $alumnos=Alumno::select($raw)->get();
        if(Alumno::all()->count())
            $id_alumno=Alumno::all()->last()->IDALUMNO+1;
        else
            $id_alumno=1; //Siguiente ID para el registro de matriculas
        $docente=Docente::all();
        $niveles=Nivel::all();
        $grados=Grado::all();
        if(Matricula::all()->count())
            $id=Matricula::all()->last()->IDMATRICULA+1;
        else
            $id=1; //Siguiente ID para el registro de matriculas
        return view('matricula.create',compact('id','id_alumno','niveles','grados','alumnos','docente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Alumno::all()->count())
            $ultimo=Alumno::all()->last()->IDALUMNO+1;
        else
            $ultimo=1; //Siguiente ID para el registro de Alumnos
        if($request->IDALUMNO==$ultimo){
            // DATOS MATRICULA ALUMNO NUEVO
            $datos = [
                        'IDALUMNO'=>$request->IDALUMNO,
                        'IDMATRICULA'=>$request->IDMATRICULA,
                        'APELLIDOPATERNO'=>$request->APELLIDOPATERNO,
                        'APELLIDOMATERNO'=>$request->APELLIDOMATERNO,
                        'PRIMERNOMBRE'=>$request->PRIMERNOMBRE,
                        'OTROSNOMBRES'=>$request->OTROSNOMBRES,
                        'ESCALA'=>$request->ESCALA,
                        'AÑOINGRESO'=>$request->AÑOINGRESO,
                        'FECMATRICULA'=>$request->FECMATRICULA,
                        'IDNIVEL'=>$request->IDNIVEL,
                        'IDGRADO'=>$request->IDGRADO,
                        'IDSECCION'=>$request->IDSECCION
                    ];
            $datos = (object) $datos;
            $niveles=Nivel::all();
            $grados=Grado::all();
            $paises=Pais::all();
            return view('alumno.create',['IDALUMNO'=>$ultimo, 'datos'=>$datos,'niveles'=>$niveles,'grados'=>$grados, 'paises'=>$paises]);
        }
        else{
            $mat = new Matricula();
            $mat->IDMATRICULA=$request->IDMATRICULA;
            $mat->IDALUMNO=$request->IDALUMNO;
            $mat->FECMATRICULA=$request->FECMATRICULA;
            $mat->IDNIVEL=$request->IDNIVEL;
            $mat->IDGRADO=$request->IDGRADO;
            $mat->IDSECCION=$request->IDSECCION;
            $mat->AÑOINGRESO=$request->AÑOINGRESO;
            $mat->estado='1';
            $mat->save();
            return redirect()->route('matricula.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Matricula::find($id);
    }

    public function matriculasxperiodo($periodo)
    {
        return Matricula::join('alumnos','alumnos.IDALUMNO','=','matriculas.IDALUMNO')
            ->select(DB::raw("alumnos.IDALUMNO, CONCAT(PRIMERNOMBRE,' ',OTROSNOMBRES,' ',APELLIDOPATERNO,' ',APELLIDOMATERNO) AS NOMBRECOMPLETO"))
            ->where('matriculas.ESTADO','=','1')
            ->where('matriculas.AÑOINGRESO','=',$periodo)
            ->get();
    }

    public function alumnoxperiodo($periodo, $id)
    {
        return Matricula::join('niveles','niveles.IDNIVEL','=','matriculas.IDNIVEL')
            ->join('grados','grados.IDGRADO','=','matriculas.IDGRADO')
            ->select(DB::raw("CONCAT(grados.GRADO,' ',niveles.NIVEL) AS AÑO'"))
            ->where('matriculas.estado','=','1')
            ->where('matriculas.AÑOINGRESO','=',$periodo)
            ->where('matriculas.IDALUMNO','=',$id)
            ->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $matricula=Matricula::findOrFail($id);
        $niveles=Nivel::all();
        $grados=Grado::where('IDNIVEL','=',$matricula->IDNIVEL)->get();
        $secciones=Seccion::where('IDGRADO','=',$matricula->IDGRADO)->get();
        return view('matricula.edit',compact('matricula','niveles','grados','secciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Matricula::find($id)->update($request->all());
        return redirect()->route('matricula.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $matricula=Matricula::findOrFail($id);
        $matricula->estado='0';
        $matricula->save();
        return redirect()->route('matricula.index')->with('datos','Registro Eliminado ... !');
    }
}
